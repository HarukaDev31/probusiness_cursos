<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database('default');
		$this->load->library('session');
		$this->load->model('CursoModel');
	}

	public function index(){
		//get Departamento
		$arrDepartamento = $this->CursoModel->getDepartamento();

		//get provincia
		if(!isset($_SESSION['provincia'])) {
			$_SESSION['provincia'] = $this->CursoModel->getProvincia();
		}
		//get distrito
		if(!isset($_SESSION['distrito'])) {
			$_SESSION['distrito'] = $this->CursoModel->getDistrito();
		}

		/* cargando izipay */
		
		/* Username, password and endpoint used for server to server web-service calls */
		//(En el Back Office) Copiar Usuario
		Lyra\Client::setDefaultUsername("78655451");
		//(En el Back Office) Copiar Contraseña de test
		Lyra\Client::setDefaultPassword("testpassword_cC71d22bmbbkpXlhKVzxy3BVG1FZm7Z4ILlTKL3lZDB4o");
		//(En el Back Office) Copiar Contraseña de Nombre del servidor API REST
		Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

		/* publicKey and used by the javascript client */
		//(En el Back Office) Copiar Clave pública de test
		Lyra\Client::setDefaultPublicKey("78655451:testpublickey_07vuSHY0ErsDxStV4VSfZfiPrIKXMg4ZAM7WWzYSqYUoL");

		/* SHA256 key */
		//(En el Back Office) Clave HMAC-SHA-256 de test
		Lyra\Client::setDefaultSHA256Key("G6pEoysq3vLZBpOYSfY7ZInsXS2o6OHodOd40Q8BjhnDU");

		$client = new Lyra\Client();

		$store = array(
			"amount" => 149 * 100,
			"currency" => "PEN",
			"orderId" => uniqid("MyOrderId"),
		);
		$response = $client->post("V4/Charge/CreatePayment", $store);

		/* I check if there are some errors */
		if ($response['status'] != 'SUCCESS') {
			/* an error occurs, I throw an exception */
			//display_error($response);
			$error = $response['answer'];
			//throw new Exception("error " . $error['errorCode'] . ": " . $error['errorMessage'] );
			$response_izipay = array(
				'status' => 'error',
				'message' => $error['errorMessage'],
				'code_error' => $error['errorCode'],
			);
			echo json_encode($response_izipay);
			exit();
		}

		/* everything is fine, I extract the formToken */
		$formToken = $response["answer"]["formToken"];
		/* fin izipay */

		$this->load->view('Curso/Registro',
			array(
				'arrDepartamento' => $arrDepartamento,
				'client' => $client,
				'formToken' => $formToken
			)
		);
	}

	function searchForIdProvincia() {
		$id = $this->input->post('ID_Departamento');
		if(isset($_SESSION['provincia']) && $_SESSION['provincia']['status']=='success') {
			$arrProvincia = array();
			foreach ($_SESSION['provincia']['result'] as $row) {
				if ($row->ID_Departamento == $id) {
					$arrProvincia[] = [
						'ID_Provincia' => $row->ID_Provincia,
						'No_Provincia' => $row->No_Provincia,
					];
				}
			}

            echo json_encode(array(
                'status' => 'success',
                'message' => 'Si hay registros',
                'result' => $arrProvincia
            ));
		} else {
            echo json_encode(array(
                'status' => 'warning',
                'message' => 'No hay registros'
            ));
		}
	}

	function searchForIdDistrito() {
		$id = $this->input->post('ID_Provincia');
		if(isset($_SESSION['distrito']) && $_SESSION['distrito']['status']=='success') {
			$arrResult = array();
			foreach ($_SESSION['distrito']['result'] as $row) {
				if ($row->ID_Provincia == $id) {
					$arrResult[] = [
						'ID_Distrito' => $row->ID_Distrito,
						'No_Distrito' => $row->No_Distrito
					];
				}
			}

            echo json_encode(array(
                'status' => 'success',
                'message' => 'Si hay registros',
                'result' => $arrResult
            ));
		} else {
            echo json_encode(array(
                'status' => 'warning',
                'message' => 'No hay registros'
            ));
		}
	}
	
	public function crearUsuario(){
		$response_izipay = array(
			'status' => 'success',
			'message' => 'Usuario creado',
		);
		echo json_encode($response_izipay);
		exit();
	}
	
	public function respuestaIzipay(){
		Lyra\Client::setDefaultSHA256Key("G6pEoysq3vLZBpOYSfY7ZInsXS2o6OHodOd40Q8BjhnDU");
		
		$client = new Lyra\Client();

		if (!$client->checkHash()) {
			//something wrong, probably a fraud ....
			$response_izipay = array(
				'status' => 'error',
				'message' => 'invalid signature'
			);
			$this->load->view('Curso/GraciasIzipay',
				array(
					'response_izipay' => $response_izipay
				)
			);
		}
		
		$rawAnswer = $client->getParsedFormAnswer();
		$formAnswer = $rawAnswer['kr-answer'];
		
		$transaction = $formAnswer['transactions'][0];
		
		$result['orderStatus'] = $formAnswer['orderStatus'];
		$result['orderId'] = $formAnswer['orderDetails']['orderId'];
		$result['transactionUuid'] = $transaction['uuid'];

		$response_izipay = array(
			'status' => 'success',
			'message' => 'Orden generada',
			'result' => $result
		);

		$this->load->view('Curso/GraciasIzipay',
			array(
				'response_izipay' => $response_izipay
			)
		);
	}

	/*
	public function respuestaIzipay(){
		//(En el Back Office) Clave HMAC-SHA-256 de test
		Lyra\Client::setDefaultSHA256Key("G6pEoysq3vLZBpOYSfY7ZInsXS2o6OHodOd40Q8BjhnDU");
		
		$client = new Lyra\Client();

		//$_POST['kr-hash']= 'Yga5AOlU5qomnyEj3EQvwMvpotybpd7q4Yk0z9ZZtUaJQ';
		if (!$client->checkHash()) {
			//something wrong, probably a fraud ....
			$response_izipay = array(
				'status' => 'error',
				'message' => 'invalid signature'
			);
			$this->load->view('Curso/GraciasIzipay',
				array(
					'response_izipay' => $response_izipay
				)
			);
			//echo json_encode($response_izipay);
			//exit();
		}
		
		$rawAnswer = $client->getParsedFormAnswer();
		$formAnswer = $rawAnswer['kr-answer'];
		
		$transaction = $formAnswer['transactions'][0];
		
		$result['orderStatus'] = $formAnswer['orderStatus'];
		$result['orderId'] = $formAnswer['orderDetails']['orderId'];
		$result['transactionUuid'] = $transaction['uuid'];

		$response_izipay = array(
			'status' => 'success',
			'message' => 'Orden generada',
			'result' => $result
		);

		$this->load->view('Curso/GraciasIzipay',
			array(
				'response_izipay' => $response_izipay
			)
		);
		//echo json_encode($formAnswer);
		//exit();
	}
	
	/*
	public function generarPedidoCurso(){
		
		//(En el Back Office) Copiar Usuario
		Lyra\Client::setDefaultUsername("78655451");
		//(En el Back Office) Copiar Contraseña de test
		Lyra\Client::setDefaultPassword("testpassword_cC71d22bmbbkpXlhKVzxy3BVG1FZm7Z4ILlTKL3lZDB4o");
		//(En el Back Office) Copiar Contraseña de Nombre del servidor API REST
		Lyra\Client::setDefaultEndpoint("https://api.micuentaweb.pe");

		//(En el Back Office) Copiar Clave pública de test
		Lyra\Client::setDefaultPublicKey("78655451:testpublickey_07vuSHY0ErsDxStV4VSfZfiPrIKXMg4ZAM7WWzYSqYUoL");

		//(En el Back Office) Clave HMAC-SHA-256 de test
		Lyra\Client::setDefaultSHA256Key("G6pEoysq3vLZBpOYSfY7ZInsXS2o6OHodOd40Q8BjhnDU");

		$client = new Lyra\Client();

		$store = array(
			"amount" => 149 * 100,
			"currency" => "PEN",
			"orderId" => uniqid("MyOrderId"),
		);
		$response = $client->post("V4/Charge/CreatePayment", $store);

		if ($response['status'] != 'SUCCESS') {
			//display_error($response);
			$error = $response['answer'];
			//throw new Exception("error " . $error['errorCode'] . ": " . $error['errorMessage'] );
			$response_izipay = array(
				'status' => 'error',
				'message' => $error['errorMessage'],
				'code_error' => $error['errorCode'],
			);
			echo json_encode($response_izipay);
			exit();
		}

		$formToken = $response["answer"]["formToken"];

		$this->load->view('Curso/Pago',
			array(
				'client' => $client,
				'formToken' => $formToken
			)
		);
	}
	
	public function respuestaIzipay(){
		//(En el Back Office) Clave HMAC-SHA-256 de test
		Lyra\Client::setDefaultSHA256Key("G6pEoysq3vLZBpOYSfY7ZInsXS2o6OHodOd40Q8BjhnDU");

		$client = new Lyra\Client();

		//$_POST['kr-hash']= 'Yga5AOlU5qomnyEj3EQvwMvpotybpd7q4Yk0z9ZZtUaJQ';
				
		if (!$client->checkHash()) {
			//something wrong, probably a fraud ....
			$response_izipay = array(
				'status' => 'error',
				'message' => 'invalid signature'
			);
			echo json_encode($response_izipay);
			exit();
		}
		
		$rawAnswer = $client->getParsedFormAnswer();
		$formAnswer = $rawAnswer['kr-answer'];
		
		$transaction = $formAnswer['transactions'][0];
		
		$result['orderStatus'] = $formAnswer['orderStatus'];
		$result['orderId'] = $formAnswer['orderDetails']['orderId'];
		$result['transactionUuid'] = $transaction['uuid'];

		$response_izipay = array(
			'status' => 'success',
			'message' => 'Orden generada',
			'result' => $result
		);
		echo json_encode($formAnswer);
		exit();
	}
	*/
}

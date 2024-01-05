<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database('default');
		$this->load->library('session');
		$this->load->library('encryption');
		$this->load->model('CursoModel');
	}

	public function index(){
		$arrPais = $this->CursoModel->getPais();

		//unset($_SESSION['departamento']);
		//unset($_SESSION['provincia']);
		//unset($_SESSION['distrito']);

		//get Departamento
		if(!isset($_SESSION['departamento'])) {
			$_SESSION['departamento'] = $this->CursoModel->getDepartamento();
		}

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
				'arrPais' => $arrPais,
				'client' => $client,
				'formToken' => $formToken
			)
		);
	}

	function searchForIdDepartamento() {
		$id = $this->input->post('ID_Pais');
		if(isset($_SESSION['departamento']) && $_SESSION['departamento']['status']=='success') {
			$arrDepartamento = array();
			foreach ($_SESSION['departamento']['result'] as $row) {
				if ($row->ID_Pais == $id) {
					$arrDepartamento[] = [
						'ID_Departamento' => $row->ID_Departamento,
						'No_Departamento' => $row->No_Departamento,
					];
				}
			}

            echo json_encode(array(
                'status' => 'success',
                'message' => 'Si hay registros',
                'result' => $arrDepartamento
            ));
		} else {
            echo json_encode(array(
                'status' => 'warning',
                'message' => 'No hay registros'
            ));
		}
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
		//array_debug($this->input->post('email'));

		$email_cliente = $this->input->post('email');
		if (!filter_var($email_cliente, FILTER_VALIDATE_EMAIL)) {
			$response_izipay = array(
				'status' => 'warning',
				'message' => 'Correo inválido',
			);
			echo json_encode($response_izipay);
			exit();
		}

		if (!is_valid_email($email_cliente)) {
			$response_izipay = array(
				'status' => 'warning',
				'message' => 'Correo inválido',
			);
			echo json_encode($response_izipay);
			exit();
		}

		if (!is_valid_email_expresion_regular($email_cliente)) {
			$response_izipay = array(
				'status' => 'warning',
				'message' => 'Correo inválido',
			);
			echo json_encode($response_izipay);
			exit();
		}

		echo json_encode($this->CursoModel->crearUsuario($this->input->post()));
		exit();
	}
	
	public function respuestaIzipay(){
		Lyra\Client::setDefaultSHA256Key("G6pEoysq3vLZBpOYSfY7ZInsXS2o6OHodOd40Q8BjhnDU");
		
		$client = new Lyra\Client();

		if (!$client->checkHash()) {
			//actualizar pedido
			$id_pedido_curso = $this->input->post('acme-hidden');
			$where = array('ID_Pedido_Curso' => $id_pedido_curso);
			$data_upd = array('Nu_Estado' => '4');//4=rechazado
			$this->CursoModel->actualizarPedido($where, $data_upd);

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

		if( $result['orderStatus']=='PAID' ){
			//actualizar pedido
			$id_pedido_curso = $this->input->post('acme-hidden');
			$where = array('ID_Pedido_Curso' => $id_pedido_curso);
			$data_upd = array('Nu_Estado' => '2');
			$this->CursoModel->actualizarPedido($where, $data_upd);

			//crear usuario para moodle


			$response_izipay = array(
				'status' => 'success',
				'message' => 'Orden generada Nro. ' . $id_pedido_curso
			);
		} else {
			$response_izipay = array(
				'status' => 'error',
				'message' => 'code: ' . $transaction['errorCode'] . 'message: ' . $transaction['errorMessage']
			);
		}

		$this->load->view('Curso/GraciasIzipay',
			array(
				'response_izipay' => $response_izipay
			)
		);
	}
}

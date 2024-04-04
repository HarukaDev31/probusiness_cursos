<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/MoodleRestPro.php');

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

		$this->load->view('Curso/Registro',
			array(
				'arrPais' => $arrPais
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
			exit();
		} else {
            echo json_encode(array(
                'status' => 'warning',
                'message' => 'No hay registros'
            ));
			exit();
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
			exit();
		} else {
            echo json_encode(array(
                'status' => 'warning',
                'message' => 'No hay registros'
            ));
			exit();
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
			exit();
		} else {
            echo json_encode(array(
                'status' => 'warning',
                'message' => 'No hay registros'
            ));
			exit();
		}
	}
	
	public function crearUsuario(){
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
		$response_izipay = array(
			'status' => 'success',
			'message' => '¡Gracias por registrarte!'
		);
		$this->load->view('Curso/GraciasIzipay',
			array(
				'response_izipay' => $response_izipay
			)
		);
	}
}

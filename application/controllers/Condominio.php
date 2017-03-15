<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Condominio extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('CondominioModel','',TRUE);
   $this->load->model('ImobiliariaModel','',TRUE);
   $this->load->model('UfModel','',TRUE);
   $this->load->model('MunicipioModel','',TRUE);
 }

	public function index() {
		$data['lista'] = $this->CondominioModel->listar();
   		$this->load->view('condominio/index', $data);
	}

	public function create() {
		$data['estados'] = $this->UfModel->listar();
		$data['cidades'] = $this->MunicipioModel->listar();
		$data['imobiliarias'] = $this->ImobiliariaModel->listar();
   		$this->load->view('condominio/create', $data);
	}
}

?>
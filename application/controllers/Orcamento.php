<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orcamento extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('OrcamentoModel','',TRUE);
   $this->load->model('CondominioModel','',TRUE);
   $this->load->model('TipoServicoModel','',TRUE);
 }

	public function index() {
		$data['lista'] = $this->OrcamentoModel->listar();
   		$this->load->view('orcamento/index', $data);
	}

	public function create(){
		$data['condominios'] = $this->CondominioModel->listar();
		$data['tiposervico'] = $this->TipoServicoModel->listar();
		$this->load->view('orcamento/create', $data);
	}
	
}

?>
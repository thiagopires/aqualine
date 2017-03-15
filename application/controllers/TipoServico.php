<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TipoServico extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('TipoServicoModel','',TRUE);
 }

	public function index() {
		$data['lista'] = $this->TipoServicoModel->listar();
   		$this->load->view('tiposervico/index', $data);
	}

	public function create() {
		$data['estados'] = $this->UfModel->listar();
		$data['cidades'] = $this->MunicipioModel->listar();
		$data['imobiliarias'] = $this->ImobiliariaModel->listar();
   		$this->load->view('condominio/create', $data);
	}
}

?>
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('MunicipioModel','',TRUE);
 }
/*
	public function index($id_uf) {
		$data = $this->MunicipioModel->listarAjax($id_uf);
   		$this->load->view('imobiliaria/index', $data);
	}
*/
	public function listarPorUf(){
		$id_uf = $this->input->get('id', TRUE);
		$lista = $this->MunicipioModel->listarPorUf($id_uf);
		foreach ($lista as $row) {
			echo '<option value="'.$row->id.'">'.$row->nome.'</option>';
		}
	}
}

?>
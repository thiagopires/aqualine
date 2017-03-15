<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Imobiliaria extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('ImobiliariaModel','',TRUE);
		$this->load->model('UfModel','',TRUE);
		$this->load->model('MunicipioModel','',TRUE);
	}

	public function index() {
		$data['lista'] = $this->ImobiliariaModel->listar();
   		$this->load->view('imobiliaria/index', $data);
	}

	public function create(){		
		//form-validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');

		if ($this->form_validation->run() == FALSE){
            $data['estados'] = $this->UfModel->listar();
			$data['cidades'] = $this->MunicipioModel->listar();
			$this->load->view('imobiliaria/create', $data);
        }else{
        	$arr_data = array(
				'nome' => $this->input->post('nome'),
				'endereco' => $this->input->post('endereco'),
				'bairro' => $this->input->post('bairro'),
				'id_uf' => $this->input->post('estado'),
				'id_municipio' => $this->input->post('cidade'),
				'cep' => $this->input->post('cep'),
				'email1' => $this->input->post('email1'),
				'email2' => $this->input->post('email2'),
				'contato' => $this->input->post('contato'),
				'telefone1' => $this->input->post('telefone1'),
				'telefone2' => $this->input->post('telefone2'),
				'fax' => $this->input->post('fax'),
				'obs' => $this->input->post('obs'),
			);
			$this->ImobiliariaModel->salvar($arr_data);

			$data['lista'] = $this->ImobiliariaModel->listar();
			$data['msg'] = 'Registro inserido com sucesso.';
			$this->load->view('imobiliaria/index', $data);
        }
	}

}

?>
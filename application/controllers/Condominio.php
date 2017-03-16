<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Condominio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('CondominioModel','',TRUE);
		$this->load->model('ImobiliariaModel','',TRUE);
		$this->load->model('UfModel','',TRUE);
		$this->load->model('MunicipioModel','',TRUE);
		$this->load->model('CaixaModel','',TRUE);
	}

	public function index() {
		$data['lista'] = $this->CondominioModel->listar();
   		$this->load->view('condominio/index', $data);
	}

	public function create() {

		//form-validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome-fantasia', 'Nome', 'trim|required');
		//$this->form_validation->set_rules('estado', 'Estado', 'required');
		//$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$data['estados'] = $this->UfModel->listar();
			$data['cidades'] = $this->MunicipioModel->listar();
			$data['imobiliarias'] = $this->ImobiliariaModel->listar();
	   		$this->load->view('condominio/create', $data);
		}else{
			$arr_data = array(
				'nome' => $this->input->post('nome-fantasia'),
				'razao_social' => $this->input->post('razao-social'),
				'id_imobiliaria' => $this->input->post('imobiliaria'),
				'endereco' => $this->input->post('endereco'),
				'id_municipio' => $this->input->post('cidade'),
				'id_uf' => $this->input->post('estado'),
				'bairro' => $this->input->post('bairro'),
				'cep' => $this->input->post('cep'),
				'telefone1' => $this->input->post('telefone1'),
				'telefone2' => $this->input->post('telefone2'),
				'obs' => $this->input->post('obs'),
				'cnpj' => $this->input->post('cnpj'),
				'dt_ult_servico' => $this->input->post('data-ult-servico'),
				'economia' => $this->input->post('economia')
			);

			$id_condominio = $this->CondominioModel->salvar($arr_data);

			$n_caixas = intval($this->input->post('ica-count'));
			for($i = 1; $i <= $n_caixas; $i++){
				$arr_ica = array(
					'descricao' => $this->input->post('ica_descricao_'.$i),
					'id_condominio' => $id_condominio,
					'localizacao' => $this->input->post('ica_localizacao_'.$i),
					'quantidade' => $this->input->post('ica_quantidade_'.$i),
					'capacidade' => $this->input->post('ica_capacidade_'.$i),
					'metragem' => $this->input->post('ica_metragem_'.$i)
				);
				$this->CaixaModel->salvar($arr_ica);
			}

			$data['lista'] = $this->CondominioModel->listar();
			$data['msg'] = 'Registro inserido com sucesso.';
			$this->load->view('condominio/index', $data);
		}

	}
}

?>
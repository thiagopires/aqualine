<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Condominio extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('CondominioModel','',TRUE);
		$this->load->model('ImobiliariaModel','',TRUE);
		$this->load->model('UfModel','',TRUE);
		$this->load->model('MunicipioModel','',TRUE);
		$this->load->model('CaixaModel','',TRUE);
		$this->load->model('ContatoCondominioModel','',TRUE);
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

			$n_contatos = intval($this->input->post('ic-count'));
			for($i = 1; $i <= $n_contatos; $i++){
				$arr_ic = array(
					'nome' => $this->input->post('ic-nome_'.$i),
					'id_condominio' => $id_condominio,
					'apto' => $this->input->post('ic-apto_'.$i),
					'telefone1' => $this->input->post('ic-telefone1_'.$i),
					'telefone2' => $this->input->post('ic-telefone2_'.$i),
					'email1' => $this->input->post('ic-email1_'.$i),
					'email2' => $this->input->post('ic-email2_'.$i),
					'data_inicio' => $this->input->post('ic-data-inicio_'.$i),
					'data_fim' => (empty($this->input->post('ic-data-fim_'.$i)) ? NULL : $this->input->post('ic-data-fim_'.$i)),
					'obs' => $this->input->post('ic-complemento_'.$i)
				);
				$this->ContatoCondominioModel->salvar($arr_ic);
			}

			$data['lista'] = $this->CondominioModel->listar();
			$data['msg'] = 'Registro inserido com sucesso.';
			$this->load->view('condominio/index', $data);
		}

	}
}

?>
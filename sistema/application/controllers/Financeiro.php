<?php
defined('BASEPATH') or exit('Acesso restrito.');

class Financeiro extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		validarLogin();
		$this->load->model('financeiroModel', 'financeiro');
		$this->load->model('transacaoModel', 'transacao');
	}

	public function index()
	{

		$dados['financeiro'] = $this->financeiro->listar();
		$this->load->view('financeiro/relatorio',$dados);
	}

	public function salvar()
	{
		
		if ($registro = $this->input->post()) {
			$this->financeiro->inserir($registro);
		}
		$this->index();
	}


}

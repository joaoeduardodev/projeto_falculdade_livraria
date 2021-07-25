<?php
defined('BASEPATH') or exit('Acesso restrito.');

class Transacoes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		validarLogin();
		$this->load->model('transacaoModel', 'transacoes');
	}

	public function index()
	{

		$dados['transacoes'] = $this->transacoes->listar();
		$this->load->view('transacoes/relatorio',$dados);
	}



}

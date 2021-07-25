<?php
defined('BASEPATH') or exit('Acesso restrito.');

class Usuario extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarioModel', 'usuarioModel');
	}

	public function index()
	{
		$this->load->view('usuario/login');
	}

	public function login()
	{

		$usuario = $this->input->post();

		if(isset($usuario['login']) && isset($usuario['senha']) ){
			$login = $this->usuarioModel->login($usuario['login'],$usuario['senha']);
		}

		if($login){
			$this->session->set_userdata('logado',TRUE);
			redirect('livro','refresh');
		}else{
			redirect('usuario','refresh');
		}
		
	}

	public function logout(){
		$this->session->set_userdata('logado',FALSE);
		$this->index();
	}


}

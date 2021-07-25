<?php
defined('BASEPATH') or exit('Acesso restrito.');

class Livro extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		validarLogin();
		$this->load->model('livroModel', 'livro');
		$this->load->model('transacaoModel', 'transacao');
	}

	public function index()
	{
		$dados['livro'] = $this->livro->listar();
		$this->load->view('livro/livros', $dados);
	}


	public function salvar()
	{
		if (($id = $this->uri->segment(3)) > 0) {
			if ($livro = $this->livro->pesquisarId($id)) {
				$dados['livro'] = $livro;
			}
		}

		if ($registro = $this->input->post()) {
			if (isset($registro['id']) && $registro['id']) {
				$livro = $this->livro->pesquisarId($registro['id']);
				//calculo do valor de uma nova compra para o mesmo produto
				$quantidade = $registro['quantidade'] - $livro->quantidade;
				if($quantidade > 0){
					$valor = $registro['valor_compra'] * $quantidade;
					$transacao = array(
						'tipo' => 0,
						'valor' => $valor,
					);
					$this->transacao->inserir($transacao);
				}
				$this->livro->editar($registro);
			} else {
				$this->livro->inserir($registro);
				//calculo do valor de compra
				$valor = $registro['valor_compra'] * $registro['quantidade'];
				$transacao = array(
					'tipo' => 0,
					'valor' => $valor,
				);
				$this->transacao->inserir($transacao);
			}

			redirect('livro', 'refresh');

			$dados['livro'] = $this->livro->listar();
		}


		if (isset($dados)) {
			$this->load->view('livro/livro', $dados);
		} else {
			$this->load->view('livro/livro');
		}
	}


	public function excluir()
	{
		if (($id = $this->uri->segment(3)) > 0) {
			$this->livro->excluir($id);
		}

		$this->index();
	}

	public function vender()
	{

		$id = $this->input->post('id_produto');
		$quantidade_venda = $this->input->post('quantidade_venda');
		$quantidade_estoque = $this->input->post('quantidade_estoque');
		$quantidade = $quantidade_estoque - $quantidade_venda;
		$livro = $this->livro->pesquisarId($id);
		//calculo do valor de venda
		$valor = $livro->valor_venda * $quantidade_venda;
		$transacao = array(
			'tipo' => 1,
			'valor' => $valor,
		);
		if (!$this->livro->vender($id, $quantidade) || !$this->transacao->inserir($transacao)) {
			$dados['mensagem'] = "Ocorreu um erro ao realizar a venda ou cadastrar a transação";
		}
		$dados['livro'] = $this->livro->listar();
		$this->load->view('livro/livros', $dados);
	}
}

<?php
defined('BASEPATH') or exit('Acesso restrito.');

class LivroModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function listar(){
        
        $query = $this->db->where('quantidade >', 0);
        $query = $this->db->get('livros');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function inserir($livro){
        $query = $this->db->insert('livros', $livro);
        return $this->db->affected_rows(); 
    }

    public function editar($livro){
        $query = $this->db->where('id',$livro['id']);
        $query = $this->db->update('livros', $livro);
        return $this->db->affected_rows(); 
    }

    public function pesquisarId($id){
        
        $query = $this->db->where('id',$id);
        $query = $this->db->get('livros',1);
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function excluir($id){
        $query = $this->db->where('id',$id);
        $query = $this->db->delete('livros');
        return $this->db->affected_rows(); 
    }

    public function vender($id,$quantidade){
        $quantidade = array( "quantidade" => $quantidade);
        $query = $this->db->where('id',$id);
        $query = $this->db->update('livros',$quantidade);
        return $this->db->affected_rows(); 
    }
    
}

<?php
defined('BASEPATH') or exit('Acesso restrito.');

class TransacaoModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function inserir($transacao){
        $query = $this->db->insert('transacoes', $transacao);
        return $this->db->affected_rows(); 
    }

    public function listar(){
        
        $query = $this->db->get('transacoes');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    
}

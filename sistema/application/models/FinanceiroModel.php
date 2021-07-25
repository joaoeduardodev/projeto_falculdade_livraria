<?php
defined('BASEPATH') or exit('Acesso restrito.');

class FinanceiroModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function inserir($financeiro){
        $query = $this->db->insert('financeiro', $financeiro);
        return $this->db->affected_rows(); 
    }

    public function listar(){
        
        $query = $this->db->get('financeiro');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    
}

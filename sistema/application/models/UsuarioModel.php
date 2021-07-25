<?php
defined('BASEPATH') or exit('Acesso restrito.');

class UsuarioModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function login($login, $senha){
        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        $consulta = $this->db->get('usuarios');
        if($consulta->num_rows() == 1){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
    
}

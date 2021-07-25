<?php
defined('BASEPATH') or exit('Acesso restrito.');

if (!function_exists('validarLogin')) {
    function validarLogin()
    {
        $ci = &get_instance();
        if (isset($ci->session)) {
            if (!$ci->session->userdata['logado']) {
                redirect('usuario', 'refresh');
            }
        } else {
            redirect('usuario', 'refresh');
        }
    }
}
?>

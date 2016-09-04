<?php defined('BASEPATH') OR exit('Acesso Negado.');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('System');
        init_dashboard();
    }

    public function index()
    {
        //$this->load->view('view');
    }

    public function login()
    {
        // Load the auth module and show the login screen
        set_theme('title','OWP | Entrar');
        set_theme('content', load_module('login'));
        load_template();
    }

}

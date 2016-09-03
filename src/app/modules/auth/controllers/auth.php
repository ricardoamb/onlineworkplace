<?php defined('BASEPATH') OR exit('Acesso Negado.');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('view');
    }

    public function login()
    {
        
    }

}
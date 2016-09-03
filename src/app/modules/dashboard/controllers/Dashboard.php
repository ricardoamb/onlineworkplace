<?php defined('BASEPATH') OR exit('Acesso Negado.');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $this->init();
    }

    public function init()
    {
        redirect('auth/login');
    }
    
}
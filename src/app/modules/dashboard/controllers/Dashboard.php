<?php defined('BASEPATH') OR exit('Acesso Negado.');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('System');
        init_dashboard();
    }

    public function index()
    {
        $this->init();
    }

    public function init()
    {
        if(is_logged(false))
        {
            set_theme('title','OWP | Online WorkPlace');
            set_theme('content',load_module('dashboard/dashboard'));
            load_template();
        }else{
            redirect('auth/login');
        }
    }
    
}
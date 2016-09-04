<?php defined('BASEPATH') OR exit('Acesso Negado.');

class Template extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function notfound()
    {
        $this->load->view('notfound');
    }
}
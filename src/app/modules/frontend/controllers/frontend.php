<?php defined('BASEPATH') OR exit('Acesso Negado.');

class Frontend extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('frontend_view');
    }


}
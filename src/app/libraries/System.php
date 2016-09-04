<?php
defined('BASEPATH') OR exit('Acesso Negado');

class System {

    protected $owp;
    public $theme = array();

    public function __construct()
    {
        $this->owp =& get_instance();
        $this->owp->load->helper('functions');
    }

}

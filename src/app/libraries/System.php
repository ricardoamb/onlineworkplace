<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System {

    protected $owp;
    public $theme = array();

    public function __construct()
    {
        $this->owp =& get_instance();
        $this->owp->load->helper('functions');
    }

}

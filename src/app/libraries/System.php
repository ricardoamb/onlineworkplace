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

    public function send_mail($to, $subject, $msg, $format='html')
    {
        $this->owp->load->library('email');
        $config['mailtype'] = $format;
        $this->owp->email->initialize($config);
        $this->owp->emial->from('system@onlineworkplace.com','Sistema Online Workplace');
        $this->owp->email->to($to);
        $this->owp->email->subject($subject);
        $this->owp->email->message($msg);
        if($this->owp->email->send())
        {
            return true;
        }else{
            return $this->owp->email->print_debugger();
        }
    }

}

<?php defined('BASEPATH') OR exit('Acesso Negado.');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('System');
        init_dashboard();
    }

    public function index()
    {
        redirect(base_url());
    }

    public function login()
    {
        $this->form_validation->set_rules('username', '<strong>Nome de usuário ou e-mail</strong>', 'trim|required');
        $this->form_validation->set_rules('password', '<strong>Senha</strong>', 'trim|required');

        if($this->form_validation->run() == true)
        {
            $username = $this->input->post('username',true);
            $password = md5($this->input->post('password',true));
            if($this->users_model->enter($username,$password) == 'ok')
            {
                echo 'logado com sucesso!';
            }else{
                if($this->users_model->enter($username,$password) == 'user')
                {
                    echo "Usuário Inxistente!";
                }
                elseif ($this->users_model->enter($username,$password) == 'passwd')
                {
                    echo 'senha incorreta!';
                }
            }
        }
        // Load the auth module and show the login screen
        set_theme('title','OWP | Entrar');
        set_theme('headerinc',load_style('pnotify','assets/vendors/pnotify/dist'),false);
        set_theme('headerinc',load_style('pnotify.buttons','assets/vendors/pnotify/dist'),false);
        set_theme('headerinc',load_style('pnotify.nonblock','assets/vendors/pnotify/dist'),false);
        set_theme('footerinc',load_js('pnotify','assets/vendors/pnotify/dist'),false);
        set_theme('footerinc',load_js('pnotify.buttons','assets/vendors/pnotify/dist'),false);
        set_theme('footerinc',load_js('pnotify.nonblock','assets/vendors/pnotify/dist'),false);
        set_theme('content', load_module('login'));
        load_template();
    }

}

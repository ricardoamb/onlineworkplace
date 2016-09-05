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
                $this->session->set_flashdata('error_message', '');
                echo 'logado com sucesso!';
            }else{
                if($this->users_model->enter($username,$password) == 'user')
                {
                    $this->session->set_flashdata('error_message', '<div class="login-errors" style="display:block;margin-bottom:30px;"><h3><i class="fa fa-exclamation-triangle"></i></h3><h2>USUÁRIO NÃO CADASTRADO</h2></div>');
                    //echo "Usuário Inxistente!";
                }
                elseif ($this->users_model->enter($username,$password) == 'passwd')
                {
                    $this->session->set_flashdata('error_message', '<div class="login-errors" style="display:block;margin-bottom:30px;"><h3><i class="fa fa-exclamation-triangle"></i></h3><h2>SENHA INCORRETA</h2></div>');
                    //echo 'senha incorreta!';
                }
            }
        }
        // Load the auth module and show the login screen
        set_theme('title','OWP | Entrar');
        set_theme('content', load_module('login'));
        load_template();
    }

}

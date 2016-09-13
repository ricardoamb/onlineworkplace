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
                $user = $this->users_model->get_user_by_login($username);
                $data = array(
                    'id'            => $user['id'],
                    'username'      => $user['username'],
                    'email'         => $user['email'],
                    'name'          => $user['name'],
                    'surname'       => $user['surname'],
                    'fullname'      => $user['fullname'],
                    'level'         => $user['level'],
                    'level_name'    => $user['level_name'],
                    'logged'        => true
                );
                $this->session->set_userdata($data);
                redirect('dashboard');
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

    public function logout()
    {
        $this->session->unset_userdata(array(
            'id'            => '',
            'username'      => '',
            'email'         => '',
            'name'          => '',
            'surname'       => '',
            'fullname'      => '',
            'level'         => '',
            'level_name'    => '',
            'logged'        => false
        ));
        $this->session->logged = false;
        //$this->session->sess_destroy();
        //$this->session->sess_create();
        set_message('logoff','Até Logo!','Você acabou de sair do sistema! Te aguardamos em breve!','success','bottom-full-width');
        redirect('auth/login');
    }

    public function recovery_password()
    {
        $email = $this->input->post('email',true);
        if(validaemail($email))
        {
            $query = $this->users_model->get_by_email($email);
            if($query->num_rows() == 1)
            {
                $new_pwd = substr(str_shuffle('abcdefghijklmnopqrstuvyxwz0123456789'),0,6);
                $msg = "<p>Você solicitou uma nova senha, a partir de agora use a seguinte senha para acesso: <strong>$new_pwd</strong></p><p>Troque esta senha para uma senha segura e de sua preferência o quanto antes.</p>";
                if($this->system->send_mail($email, 'Nova Senha | Online Workplace', $msg))
                {
                    echo 'senha_recriada';
                }
            }
        }else{
            echo 'email_invalido';
        }
    }
}

<?php defined('BASEPATH') OR exit('Acesso Negado.');

class Users_model extends CI_Model {

    public function enter($username=null, $password)
    {
        if($username && $password)
        {
            $queryUsername = $this->db->get_where('owp_users', array('username' => $username));
            if($queryUsername->num_rows() == 1)
            {
                //Usuário cadastrado
                $user = $queryUsername->row()->id;
                $queryPassword = $this->db->get_where('owp_password',array('id' => $user, 'password' => $password));
                if($queryPassword->num_rows() == 1)
                {
                    return 'ok';
                }else{
                    return 'passwd';
                }

            }else{
                $queryEmail = $this->db->get_where('owp_users',array('email' => $username));
                if($queryEmail->num_rows() == 1)
                {
                    //Email Cadastrado
                    $user = $queryEmail->row()->id;
                    $queryPassword = $this->db->get_where('owp_password',array('id' => $user, 'password' => $password));
                    if($queryPassword->num_rows() == 1)
                    {
                        return 'ok';
                    }else{
                        return 'passwd';
                    }
                }else{
                    return 'user';
                }
            }
        }
    }
}
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

    public function get_user_by_login($username=null)
    {
        if($username != null){
            $queryPeople = $this->db->get_where('owp_users',array('username' => $username),1);
            if($queryPeople->num_rows() == 1)
            {
                return $this->get_people($queryPeople);
            }else{
                $queryPeople = $this->db->get_where('owp_users',array('email' => $username),1);
                if($queryPeople->num_rows() == 1)
                {
                    return $this->get_people($queryPeople);
                }
            }
        }else{
            return false;
        }
    }

    public function get_people($query='null')
    {
        $id = $query->row()->id;
        $queryUser = $this->db->get_where('owp_users',array('id' => $id),1)->row();
        $queryPeople = $this->db->get_where('owp_people',array('user_id' => $id),1)->row();
        $queryHierarchy = $this->db->get_where('owp_hierarchy',array('user_id' => $id),1)->row();
        $queryLevel = $this->db->get_where('owp_hierarchy_levels',array('id' => $queryHierarchy->hierarchy),1)->row();
        $user = array(
            'id' => $id,
            'username'      => $queryUser->username,
            'email'         => $queryUser->email,
            'name'          => $queryPeople->name,
            'surname'       => $queryPeople->surname,
            'fullname'      => $queryPeople->name . ' ' . $queryPeople->surname,
            'level'         => $queryHierarchy->hierarchy,
            'level_name'    => $queryLevel->level_name
        );
        return $user;
    }
}
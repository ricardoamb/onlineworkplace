<?php defined('BASEPATH') OR exit('Acesso Negado');

//Load the system module retriving the get screen
function load_module($module = null, $directory='template', $info=null)
{
    $owp =& get_instance();
    if($module != null)
    {
        return $owp->load->view("$directory/$module", array(), true);
    }else{
        return false;
    }
}

//Set values to the "Theme Array" in the system
function set_theme($prop, $value, $replace=true)
{
    $owp =& get_instance();
    $owp->load->library('System');
    if($replace)
    {
        $owp->system->theme[$prop] = $value;
    }else{
        if(!isset($owp->system->theme[$prop])) $owp->system->theme[$prop] = "";
        $owp->system->theme[$prop] .= $value;
    }
}

// Return values from "Theme Array" in the system
function get_theme()
{
    $owp =& get_instance();
    $owp->load->library('System');
    return $owp->system->theme;
}

//Init the dashboard and load the necessaries resources
function init_dashboard()
{
    $owp =& get_instance();
    $owp->load->library(array('System','parser','session','form_validation'));
    $owp->load->helper(array('form','url','array','text'));
    $owp->load->models(array('users_model'));

    set_theme('default_title','OWP | Dashboard');
    set_theme('default_footer', 'MR Sistemas');
    set_theme('template','dashboard/dashboard_view');
    set_theme('favicon','    <link rel="shortcut icon" href="'.base_url('assets/images').'/favicon.png" type="image/x-icon" />');
    set_theme('headerinc',load_style('bootstrap.min','assets/vendors/bootstrap/dist/css'),false);
    set_theme('headerinc',load_style('font-awesome.min','assets/vendors/font-awesome/css'),false);
    set_theme('headerinc',load_style('nprogress','assets/vendors/nprogress'),false);
    set_theme('headerinc',load_style('animate.min','assets/vendors/animate.css'),false);
    set_theme('headerinc',load_style('jquery.mCustomScrollbar.min','assets/vendors/malihu-custom-scrollbar-plugin'),false);
    set_theme('headerinc',load_style('toastr.min','assets/vendors/toastr'),false);
    set_theme('headerinc',load_style('custom','assets/build/css'),false);
    set_theme('headerinc',load_style('main-dashboard'),false);

    set_theme('footerinc',load_js('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js','',true),false);
    set_theme('footerinc',load_js('bootstrap.min','assets/vendors/bootstrap/dist/js'),false);
    set_theme('footerinc',load_js('fastclick','assets/vendors/fastclick/lib'),false);
    set_theme('footerinc'.load_js('nprogress','assets/vendors/nprogress'),false);
    set_theme('footerinc',load_js('jquery.mCustomScrollbar.concat.min','assets/vendors/malihu-custom-scrollbar-plugin'),false);
    set_theme('footerinc',load_js('jquery.mousewheel-3.0.6.pack','assets/vendors/fancyBox/lib'),false);
    set_theme('footerinc',load_js('toastr.min','assets/vendors/toastr'),false);
    set_theme('footerinc',load_js('jquery.fullscreen.min','assets/vendors/jquery.fullscreen/release'),false);
    set_theme('footerinc',load_js('custom.min','assets/build/js'),false);
    set_theme('footerinc',load_js('main'),false);
}

//Load a template passing the Theme Array as parameter
function load_template()
{
    $owp =& get_instance();
    $owp->load->library('System');
    $owp->parser->parse($owp->system->theme['template'],get_theme());
}

//Load one or many stylesheets (CSS)
function load_style($file=null,$folder='assets/css',$media='all')
{
    if($file!=null)
    {
        $owp =& get_instance();
        $owp->load->helper('url');
        $ret = '';
        if(is_array($file))
        {
            foreach($file as $style)
            {
                $ret .= '   <link rel="stylesheet" type="text/css" href="'. base_url("$folder/$style.css") .'" medi="'. $media .'" />' . PHP_EOL;
            }
        }else{
            $ret = '    <link rel="stylesheet" type="text/css" href="'. base_url("$folder/$file.css") .'" medi="'. $media .'" />' . PHP_EOL;
        }
    }
    return $ret;
}

//Load one or many JS files from a folder or remotely
function load_js($file=null,$folder='assets/js',$remote=false)
{
    if($file!=null)
    {
        $owp =& get_instance();
        $owp->load->helper('url');
        $ret = '';
        if(is_array($file))
        {
            foreach($file as $jsf)
            {
                if($remote)
                {
                    $ret .= '   <script type="text/javascript" src="'.$jsf.'"></script>' . PHP_EOL;
                }else{
                    $ret .= '   <script type="text/javascript" src="'.base_url("$folder/$jsf.js").'"></script>' . PHP_EOL;
                }
            }
        }else{
            if($remote)
            {
                $ret .= '   <script type="text/javascript" src="'.$file.'"></script>' . PHP_EOL;
            }else{
                $ret .= '   <script type="text/javascript" src="'.base_url("$folder/$file.js").'"></script>' . PHP_EOL;
            }        }
    }
    return $ret;
}

//Show form validations errors
function validation_er()
{

    if(validation_errors())
    {
        echo '<div class="login-errors">';
        echo '    <h3><i class="fa fa-exclamation-triangle"></i></h3>';
        echo '        <ul>';
        echo              validation_errors('<li>','</li>');
        echo '        </ul>';
        echo '</div>';
    }

}

// Verify if user is logged in the system
function is_logged($redir=true)
{
    $owp =& get_instance();
    $owp->load->library('session');
    $user_status = $owp->session->userdata('logged');
    if(!isset($user_status) || $user_status != true)
    {
        $owp->session->sess_destroy();
        //$owp->session->sess_create();
        if($redir){
            redirect('auth/login');
        }else{
            return false;
        }
    }else{
        return true;
    }
}

function get_date_br()
{
    $semana = array
    (
        0 => 'Domingo',
        1 => 'Segunda-Feira',
        2 => 'Terça-Feira',
        3 => 'Quarta-Feira',
        4 => 'Quinta-Feira',
        5 => 'Sexta-Feira',
        6 => 'Sábado'
    );
    $mes = array
    (
        1 => 'Janeiro',
        2 => 'Fevereiro',
        3 => 'Março',
        4 => 'Abril',
        5 => 'Maio',
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Desembro'
    );
    $week = $semana[date('w')];
    $day = date('d');
    $month = $mes[date('n')];
    $year = date('Y');
    return $week . ' , ' . $day . ' de ' . $month . ' de ' . $year;
}

//Set a message to be show in the next screen of the system
function set_message($id='error_message', $title=null, $msg=null, $type='error', $position='top-right')
{
    $owp =& get_instance();
    if($title != null && $msg != null)
    {
        switch($type)
        {
            case 'error':
                $owp->session->set_flashdata($id,'<span class="hide" id="message" data-message="show" data-type="error" data-message-title="'.$title.'" data-pos="'.$position.'">'.$msg.'</span>');
                break;
            case 'success':
                $owp->session->set_flashdata($id,'<span class="hide" id="message" data-message="show" data-type="success" data-message-title="'.$title.'" data-pos="'.$position.'">'.$msg.'</span>');
                break;
            case 'info';
                $owp->session->set_flashdata($id,'<span class="hide" id="message" data-message="show" data-type="info" data-message-title="'.$title.'" data-pos="'.$position.'">'.$msg.'</span>');
                break;
            case 'warning';
                $owp->session->set_flashdata($id,'<span class="hide" id="message" data-message="show" data-type="warning" data-message-title="'.$title.'" data-pos="'.$position.'">'.$msg.'</span>');
                break;
            default:
                $owp->session->set_flashdata($id,'<span class="hide" id="message" data-message="show" data-type="info" data-message-title="'.$title.'" data-pos="'.$position.'">'.$msg.'</span>');
                break;
        }
    }
}

// Verify if exists a message and show or get it
function get_message($id, $show=true)
{
    $owp =& get_instance();
    if($owp->session->flashdata($id))
    {
        if($show)
        {
            echo $owp->session->flashdata($id);
            return true;
        }else{
            return $owp->session->flashdata($id);
        }
    }else{
        echo '<span class="hide">Não achou nada!</span>';
        return false;
    }
}

function validaemail($email){
    //verifica se e-mail esta no formato correto de escrita
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
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
    //$owp->load->models(array());

    set_theme('default_title','OWP | Dashboard');
    set_theme('default_footer', 'MR Sistemas');
    set_theme('template','dashboard/dashboard_view');
}

//Load a template passing the Theme Array as parameter
function load_template()
{
    $owp =& get_instance();
    $owp->load->library('System');
    $owp->parser->parse($owp->system->theme['template'],get_theme());
}
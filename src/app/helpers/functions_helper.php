<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Load the system module retriving the get screen
function load_module($module = null, $screen=null, $directory='dashboard')
{
    $owp =& get_instance();
    if($module != null)
    {
        return $owp->load->view("$directory/$module", array('screen'=>$screen), true);
    }else{
        return false;
    }
}

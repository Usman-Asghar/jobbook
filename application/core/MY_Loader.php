<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    public function admin_template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view(ADMIN_DIR.'includes/header', $vars, $return);
        	$content .= $this->view(ADMIN_DIR.'includes/leftside', $vars, $return);
            $content .= $this->view(ADMIN_DIR.$template_name, $vars, $return);
            $content .= $this->view(ADMIN_DIR.'includes/rightside', $vars, $return);
            $content .= $this->view(ADMIN_DIR.'includes/footer', $vars, $return);

            return $content;
        else:
            $this->view(ADMIN_DIR.'includes/header', $vars);
        	$this->view(ADMIN_DIR.'includes/leftside', $vars);
            $this->view(ADMIN_DIR.$template_name, $vars);
            $this->view(ADMIN_DIR.'includes/rightside', $vars);
            $this->view(ADMIN_DIR.'includes/footer', $vars);
        endif;
    }

    public function front_template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view('includes/header', $vars, $return);
            $content .= $this->view('includes/leftside', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('includes/rightside', $vars, $return);
            $content .= $this->view('includes/footer', $vars, $return);

            return $content;
        else:
            $this->view('includes/header', $vars);
            $this->view('includes/leftside', $vars);
            $this->view($template_name, $vars);
            $this->view('includes/rightside', $vars);
            $this->view('includes/footer', $vars);
        endif;
    }
}

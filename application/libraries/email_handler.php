<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_handler 
{
    public $data = array();
    private $CI;
   
    public function __construct() 
    {
        $this->CI = & get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->helper('security');
        $this->CI->load->helper('date');
        $this->CI->load->library('email');
        $this->CI->load->library('parser');
        $this->to = 'jobbook@gmail.com';
    }
    
    function sendEmail($email,$subject,$message)
    {
        $this->CI->email->from($this->to, 'Job Book Administration');
        $this->CI->email->to($email);
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);
        return $this->CI->email->send();
    }
}
?>
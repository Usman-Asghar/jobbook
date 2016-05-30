<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 *  
		Code by : Yousaf Hassan
		Email : usafhassan@gmail.com
	 */
	 
	function __construct()
        {
            parent::__construct();
        }
	 
	public function index()
	{
            $data['page_title'] = 'Home Page';
            $this->load->front_template('index',$data);
	}
        
        public function login()
	{
            $data['page_title'] = 'Login';
            $this->load->front_template('login',$data);
	}
        
        public function contact()
	{
            $data['page_title'] = 'Contact Us';
            $this->load->front_template('contact',$data);
	}
        
        public function jobs()
	{
            $data['page_title'] = 'Jobs';
            $this->load->front_template('jobs',$data);
	}
        
        public function profile()
	{
            if(!$this->session->userdata('user_logged_in'))
            {
                    redirect('main/login');
                    exit();
            }
            $data['page_title'] = 'User Profile';
            $this->load->front_template('profile',$data);
	}
        
        public function single()
	{
            $data['page_title'] = 'Job Detail';
            $this->load->front_template('single',$data);
	}
        public function about()
	{
            $data['page_title'] = 'About Us';
            $this->load->front_template('about',$data);
	}
        
        public function logout()
	{
            $array_items = array('user_logged_in' => '','user_id' => '','user_name' => '','user_fname' => '','user_lname' => '','user_email' => '');
            $this->session->unset_userdata($array_items);
            $this->session->sess_destroy();
            redirect('main');
	}
}
?>
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
        
        public function register()
	{
            $data['page_title'] = 'Register Account';
            $this->load->front_template('register',$data);
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
            $data['page_title'] = 'User Profile';
            $this->load->front_template('profile',$data);
	}
        
        public function single()
	{
            $data['page_title'] = 'Job Detail';
            $this->load->front_template('single',$data);
	}
}
?>
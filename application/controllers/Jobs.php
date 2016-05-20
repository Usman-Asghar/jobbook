<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jobs extends CI_Controller {

	/**
	 *  
		Licensed by Yousaf Hassan
	 	Please do not remove this comment
		@Author : Yousaf Hassan
		@Email : usafhassan@gmail.com
		Date : 21/01/2016
	 */
	 
	function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('user_logged_in')){
			redirect('main/login');
			exit();
		}
    }
	 
	public function index()
	{	
		$this->load->library("pagination");
		$data['page_title'] = 'Jobs Dashboard';
		$this->load->front_template('jobs',$data);
	}
	
        public function job_apply()
	{	
		$this->load->library("pagination");
		$data['page_title'] = 'Single Job';
		$this->load->front_template('single',$data);
	}
        
	public function profile()
	{	
		$data['page_title'] = 'User Profile';
		$data['message'] = '';
		if($this->input->post())
		{
		
			$this->form_validation->set_rules('user_fname', 'First Name', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('user_lname', 'Last Name', 'trim|max_length[30]');
			$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email|xss_clean|max_length[50]');
			
			if(!$this->form_validation->run()){
				$data['message'] = validation_errors('<p class="alert alert-danger">');
			}else{

				$dt = array(
					'user_name' => $this->input->post('user_fname') .' '.$this->input->post('user_lname'),
					'fname' => $this->input->post('user_fname'),
					'lname' => $this->input->post('user_lname'),
					'email' => $this->input->post('user_email')
				);

				if($data['message']==''){
					// Update the session as well
					$this->session->set_userdata($dt);
					unset($dt['user_name']);
					$conditions = array( 'user_id' => $this->session->userdata('user_id'));
					if( $this->Common_Model->update(TBL_USERS, $dt,  $conditions) )
						$data['message'] = '<p class="alert alert-success">Profile Updated Successfully!</p>';
					else
						$data['message'] = '<p class="alert alert-danger">Failed to Update Profile!</a>';
				}
			}
			
		}
		$this->load->front_template('profile',$data);
	}
	
	public function settings()
	{
		$data['page_title'] = 'User Settings';
		$data['message'] = '';
		if($this->input->post())
		{
			$this->form_validation->set_rules('current_password', 'Old Password', 'trim|required');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('re_new_password', 'Confirm New Password', 'trim|required|matches[new_password]');
			if(!$this->form_validation->run()){
				$data['message'] = '<div class="alert alert-danger">' . validation_errors() .'</div>';
			}else{
				$current_pass = hash("SHA256", $this->input->post('current_password') . $this->config->item('encryption_key') );
				$conditions = array('user_id' => $this->session->userdata('user_id'), 'password' => $current_pass);
				if( !$this->Common_Model->get_single_row(TBL_USERS, $conditions) )
				{
					$data['message'] = '<p class="alert alert-danger">Incorrect Current Password!</a>';
				}else{
					$dt = array(
						'password' => hash("SHA256", $this->input->post('new_password') . $this->config->item('encryption_key') )
					);
					$conditions = array( 'user_id' => $this->session->userdata('user_id'));
					if( $this->Common_Model->update(TBL_USERS, $dt,  $conditions) )
						$data['message'] = '<p class="alert alert-success">Password Updated Successfully!</p>';
					else
						$data['message'] = '<p class="alert alert-danger">Failed to Update Password!</a>';
				}
			}
			
		}
		$this->load->front_template('settings',$data);
	}
	
	public function logout()
	{
		$array_items = array('user_logged_in' => '','user_id' => '','user_name' => '','user_fname' => '','user_lname' => '','user_email' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('user-login');
	}
	
	
}

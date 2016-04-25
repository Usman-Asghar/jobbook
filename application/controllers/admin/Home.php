<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 *  
	 *	Please do not remove this comment

	 *	@author : Yousaf Hassan
	 *	@Email : usafhassan@gmail.com
	 *	Date : 21/01/2016
	 */
	 
	function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('admin_logged_in')){
			redirect('admin-login');
			exit();
		}
    }
	 
	public function index()
	{	
		$this->load->library("pagination");
		$this->load->model('admin','Admin_Model');
		
		$data['page_title'] = 'Admin Dashboard';

		$this->load->admin_template('dashboard',$data);
	}
	
	public function profile()
	{	
		$data['page_title'] = 'Admin Profile';
		$data['message'] = '';
		if($this->input->post())
		{
		
			$this->form_validation->set_rules('admin_fname', 'First Name', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('admin_lname', 'Last Name', 'trim|max_length[30]');
			$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|xss_clean|max_length[50]');
			
			if(!$this->form_validation->run()){
				$data['message'] = validation_errors('<p class="alert alert-danger">');
			}else{

				$dt = array(
					'admin_name' => $this->input->post('admin_fname') .' '.$this->input->post('admin_lname'),
					'admin_fname' => $this->input->post('admin_fname'),
					'admin_lname' => $this->input->post('admin_lname'),
					'admin_email' => $this->input->post('admin_email')
				);

				if($data['message']==''){
					// Update the session as well
					$this->session->set_userdata($dt);
					unset($dt['admin_name']);
					$conditions = array( 'admin_id' => $this->session->userdata('admin_id'));
					if( $this->Common_Model->update(TBL_ADMIN, $dt,  $conditions) )
						$data['message'] = '<p class="alert alert-success">Profile Updated Successfully!</p>';
					else
						$data['message'] = '<p class="alert alert-danger">Failed to Update Profile!</a>';
				}
			}
			
		}
		$this->load->admin_template('profile',$data);
	}

	public function settings()
	{	
		$data['page_title'] = 'Settings';
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
				$conditions = array('admin_id' => $this->session->userdata('admin_id'), 'admin_password' => $current_pass);
				if( !$this->Common_Model->get_single_row(TBL_ADMIN, $conditions) )
				{
					$data['message'] = '<p class="alert alert-danger">Incorrect Current Password!</a>';
				}else{
					$dt = array(
						'admin_password' => hash("SHA256", $this->input->post('new_password') . $this->config->item('encryption_key') )
					);
					$conditions = array( 'admin_id' => $this->session->userdata('admin_id'));
					if( $this->Common_Model->update(TBL_ADMIN, $dt,  $conditions) )
						$data['message'] = '<p class="alert alert-success">Password Updated Successfully!</p>';
					else
						$data['message'] = '<p class="alert alert-danger">Failed to Update Password!</a>';
				}
				
			}
			
		}
		$this->load->admin_template('settings',$data);
	}
	
	public function logout()
	{
		$array_items = array('admin_logged_in' => '','admin_id' => '','admin_name' => '','admin_fname' => '','admin_lname' => '','admin_email' => '', 'region_id' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('admin-login');
	}
	
	private function load_header($data)
	{
		$this->load->view('includes/top', $data);
		$this->load->view('includes/header');
	}
	
	private function load_footer()
	{
		$this->load->view('includes/footer');
	}
	
}

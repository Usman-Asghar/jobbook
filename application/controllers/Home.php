<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		
		$this->load_header($data);
		$filter = array('region_id' => $this->session->userdata('region_id'));
		if( $this->input->post('top_filtered_date') )
			$filter['date_entered'] = $this->common_functions->dateToSQL( $this->input->post('top_filtered_date') );
		$data['licenses'] = $this->Admin_Model->get_dashboard_data(P1,0, $filter);
		$data['categories'] = $this->Common_Model->get_all_rows_with_conditions(TBL_CATS, array('cat_status'=>'1') );
		$data['blood_groups'] = $this->Common_Model->get_all_rows_with_conditions(TBL_BLOOD, array('group_status'=>'1') );
		$this->load->view('dashboard',$data);
		$this->load_footer();
	}
	
	public function profile()
	{	
		$data['page_title'] = 'Admin Profile';
		$this->load_header($data);
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

				if (!empty($_FILES['admin_sign']['name'])) {
					$upload_response = $this->upload_signatures('admin_sign');
					if(is_array($upload_response))
						$dt['admin_sign'] = $upload_response['file_name'];
					else
						$data['message'] = $upload_response;
				}

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
		$this->load->view('profile',$data);
		$this->load_footer();
	}

	public function change_password()
	{	
		$data['page_title'] = 'Change Passsword';
		$this->load_header($data);
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
		$this->load->view('change_password',$data);
		$this->load_footer();
	}
	
	public function logout()
	{
		$array_items = array('admin_logged_in' => '','admin_id' => '','admin_name' => '','admin_fname' => '','admin_lname' => '','admin_email' => '');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect('admin-login');
	}
	
	private function load_header($data)
	{
		$this->load->view('includes/header',$data);
	}
	
	private function load_footer()
	{
		$this->load->view('includes/footer');
	}
	
}

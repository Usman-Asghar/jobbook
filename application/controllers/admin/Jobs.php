<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	/**
	 *  
	 *	Please do not remove this comment

	 *	@author : Yousaf Hassan
	 *	@Email : usafhassan@gmail.com
	 *	Date : 20/03/2016
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
		$this->load->model('admin','Admin_Model');
		$this->load->model('users','User_Model');
		
		$data['page_title'] = 'Job Board';
		$data['jobs'] = $this->Admin_Model->get_all_jobs_and_users( array('yh_jobs.job_status' => '1', 'yh_jobs.admin_id'=>$this->session->userdata('admin_id')) );
		$data['users'] = $this->User_Model->get_all_users( array('profile_status' => '1','admin_id'=>$this->session->userdata('admin_id')) );
		$this->load->admin_template('jobs',$data);
	}
	
	public function calendar_view()
	{
		$data['page_title'] = 'Calendar View';
		$this->load->admin_template('calendar_view',$data);
	}
}

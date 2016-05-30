<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_old extends CI_Controller {

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
                    if(!$this->session->userdata('user_logged_in')){
                            redirect('main');
                            exit();
                    }
        }
	 
	public function index()
	{
		$this->load->model('user','User_Model');
		
		$data['page_title'] = 'Job Board';
		$data['jobs'] = $this->User_Model->get_all_jobs( array('job_status' => '1','assigned_to'=>$this->session->userdata('user_id')) );
		$this->load->front_template('jobs',$data);
	}
	
	public function calendar_view()
	{
		$data['page_title'] = 'Calendar View';
		$this->load->front_template('calendar_view',$data);
	}
	
	public function get_calendar_jobs()
	{
		$this->load->model('user','User_Model');
		$data['jobs'] = $this->User_Model->get_all_jobs( array('job_status' => '1','assigned_to'=>$this->session->userdata('user_id')) );
		$calendar_events = array();
		
		foreach($data['jobs'] as $job):
			$calendar_events[] = array(
            'id' => $job->job_id,
			'title' => $job->job_title,
            'start' => $job->start_date,
            'end' => $job->deadline_date,
			'className' => 'bg-purple'
        );
		endforeach;
		
		echo json_encode($calendar_events);
	}
	
}

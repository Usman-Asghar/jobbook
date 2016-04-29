<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_all_jobs($conditions){
		return $this->db->get_where(TBL_JOBS, $conditions)->result();
	}
	
	public function get_all_jobs_and_users($conditions)
	{
		$this->db->select('job_id,job_no,job_title,job_desc,start_date,deadline_date,fname,lname');
		$this->db->from(TBL_JOBS);
		$this->db->join('yh_users', 'yh_users.user_id = yh_jobs.assigned_to');
		$this->db->where($conditions);
		return	$query = $this->db->get()->result();

		//return $this->db->get_where(TBL_JOBS, $conditions)->result();
	}
	
}// end of model

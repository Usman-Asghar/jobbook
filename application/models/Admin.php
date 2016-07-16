<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_all_jobs($conditions)
        {
            $this->db->select('yh_jobs.*,yh_grades.grade_color,yh_grades.grade_name');
            $this->db->from(TBL_JOBS);
            $this->db->join('yh_grades', 'yh_grades.grade_id = yh_jobs.grade_id','left');
            $this->db->where($conditions);
            return $query = $this->db->get()->result();	
	}
	
	public function get_all_jobs_and_users($conditions)
	{
		$this->db->select('job_id,yh_jobs.grade_id,job_title,job_desc,start_date,deadline_date,fname,lname,grade_name');
		$this->db->from(TBL_JOBS);
		$this->db->join('yh_users', 'yh_users.user_id = yh_jobs.assigned_to','left');
                $this->db->join('yh_grades', 'yh_grades.grade_id = yh_jobs.grade_id','left');
		$this->db->where($conditions);
		return	$query = $this->db->get()->result();

		//return $this->db->get_where(TBL_JOBS, $conditions)->result();
	}
	
	public function get_all_grades($conditions){
		$this->db->select('grade_id,grade_name,grade_status');
		$this->db->from(TBL_GRADES);
		$this->db->where($conditions);
		return	$query = $this->db->get()->result();
	}
	
        public function get_user_jobs($conditions)
	{
		$this->db->select('yh_user_to_jobs.id,yh_user_to_jobs.user_id,yh_user_to_jobs.rejected,yh_user_to_jobs.approved,yh_jobs.job_id,yh_jobs.grade_id,job_title,job_desc,yh_user_to_jobs.start_date,yh_user_to_jobs.end_date,yh_user_to_jobs.no_of_hours,fname,lname,grade_name');
		$this->db->from(TBL_USERS_TO_JOBS);
		$this->db->join('yh_users', 'yh_users.user_id = yh_user_to_jobs.user_id','inner');
                $this->db->join('yh_jobs', 'yh_jobs.job_id = yh_user_to_jobs.job_id','inner');
                $this->db->join('yh_grades', 'yh_grades.grade_id = yh_jobs.grade_id','inner');
		$this->db->where($conditions);
		return $this->db->get()->result();
	}
        
        public function get_email_data($conditions)
	{
            $this->db->select('yh_jobs.job_title,yh_jobs.job_desc,yh_users.email');
            $this->db->from(TBL_USERS_TO_JOBS);
            $this->db->join('yh_users', 'yh_users.user_id = yh_user_to_jobs.user_id','inner');
            $this->db->join('yh_jobs', 'yh_jobs.job_id = yh_user_to_jobs.job_id','inner');
            $this->db->where($conditions);
            return $this->db->get()->row();
	}
        
        public function get_user_jobs_by_job_id($conditions)
	{
		$this->db->select('yh_user_to_jobs.id,yh_user_to_jobs.user_id,yh_user_to_jobs.rejected,yh_user_to_jobs.approved,yh_jobs.job_id,yh_jobs.grade_id,job_title,job_desc,yh_user_to_jobs.start_date,yh_user_to_jobs.end_date,yh_user_to_jobs.no_of_hours,fname,lname,grade_name');
		$this->db->from(TBL_JOBS);
		$this->db->join('yh_user_to_jobs', 'yh_user_to_jobs.job_id = yh_jobs.job_id','left');
                $this->db->join('yh_users', 'yh_users.user_id = yh_user_to_jobs.user_id','left');
                $this->db->join('yh_grades', 'yh_grades.grade_id = yh_jobs.grade_id','left');
		$this->db->where($conditions);
		return $this->db->get()->result();
	}
        
}// end of model

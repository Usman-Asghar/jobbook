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
			redirect('main');
			exit();
		}
                $this->load->model('user','User_Model');
                $this->load->library("pagination");
    }
	 
	public function index()
	{	
		echo $this->pagination->create_links();
                
		$data['page_title'] = 'Jobs Dashboard'; 
                $config['base_url'] = base_url().'/jobs/index/page';
                $config['total_rows'] = $this->User_Model->get_user_jobs_count(array('yh_jobs.assigned_to' => '0'),0,$this->session->userdata('user_id'));
                $config['per_page'] = 5;
                
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active">';
                $config['cur_tag_close'] = '<li>';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $data['jobs'] = $this->User_Model->get_user_jobs(array('yh_jobs.assigned_to' => '0'),0,$this->session->userdata('user_id'),$config["per_page"], $page);
                $data['pagination'] = $this->pagination->create_links();
                $data['status'] = 4;
                $this->load->front_template('jobs',$data);
	}
        
	public function applied_jobs()
	{	
		echo $this->pagination->create_links();
                $data['page_title'] = 'Jobs Dashboard';
                $config['base_url'] = base_url().'/jobs/applied_jobs/page';
                $config['total_rows'] = $this->User_Model->count_get_user_applied_jobs(array('yh_user_to_jobs.user_id'=>$this->session->userdata('user_id')));
                $config['per_page'] = 5;
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active">';
                $config['cur_tag_close'] = '<li>';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $data['jobs'] = $this->User_Model->get_user_applied_jobs(array('yh_user_to_jobs.user_id'=>$this->session->userdata('user_id')),$config["per_page"],$page);
                $data['pagination'] = $this->pagination->create_links();
                $data['status'] = 5;
                $this->load->front_template('applied_jobs',$data);
	}
        
        public function job_apply($job_id)
	{	
            $data['page_title'] = 'Single Job';
            $data['already_applied'] = $this->User_Model->already_applied(array('job_id'=>$job_id, 'user_id'=>$this->session->userdata('user_id')));
            if($data['already_applied'])
            {
                $data['jobs'] = $this->User_Model->get_single_job(array('yh_jobs.job_id'=>$job_id, 'user_id'=>$this->session->userdata('user_id')));
            }
            else
            {
                $data['jobs'] = $this->User_Model->get_single_job(array('yh_jobs.job_id'=>$job_id));
            }
            $data['public_attachments'] = $this->User_Model->get_public_attachments(array('is_public' => '1','job_id'=>$job_id));
            $data['private_attachments'] = $this->User_Model->get_public_attachments(array('is_public' => '0','job_id'=>$job_id));
            $this->load->front_template('single',$data);
	}
        
        public function download($file_address)
	{	
             $this->load->helper('download');
             $data = file_get_contents("./uploads/".$file_address); // Read the file's contents
             $name = $file_address;
             force_download($name, $data);
        }
        
        public function job_applied_detail($job_id)
	{	
            $data['page_title'] = 'Single Job';
            $data['jobs'] = $this->User_Model->get_user_jobs_after_applied(array('yh_user_to_jobs.user_id'=>$this->session->userdata('user_id'),'yh_jobs.grade_id' => $this->session->userdata('grade_id')),$job_id,$this->session->userdata('user_id'));
            $data['public_attachments'] = $this->User_Model->get_public_attachments(array('is_public' => '1','job_id'=>$job_id));
            $data['private_attachments'] = $this->User_Model->get_public_attachments(array('is_public' => '0','job_id'=>$job_id));
            $this->load->front_template('single',$data);
	}
        
        public function apply_for_job()
        {
            $response = array('success'=>false,'message'=>'');
            $this->form_validation->set_rules('start_date', 'Deadline Date', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('end_date', 'End Date', 'trim|required|max_length[15]');
            $this->form_validation->set_rules('no_of_hours', 'No of Hours', 'trim|required|ucfirst|max_length[15]');
            if($this->form_validation->run() == FALSE)
            { 
                $response['message'] = validation_errors();
            }
            else
            {
                $errors = array();

                if(!empty($errors))
                {
                        $response['message'] = $errors;
                }
                else
                {
                    $added=$this->Common_Model->add(TBL_USERS_TO_JOBS,
                    array(
                            'user_id' => $this->session->userdata('user_id'),
                            'job_id'=> $this->security->xss_clean($this->input->post('jobId')),
                            'start_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('start_date')) ),
                            'end_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('end_date')) ),
                            'no_of_hours'=> $this->security->xss_clean($this->input->post('no_of_hours'))
                        )
                    );
                        if($added){
                            $response['message'] = 'You have Applied for Job Successfully!';
                            $response['success'] = true;
                        }
                        else $response['message'] = 'Failed to Apply for Job!';
                }
            }
            echo json_encode($response);    
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
	
        public function close_user_job()
        {
            $response = array('success'=>false,'message'=>'');
            $new_data = array(
                'approved'=> '2'
            );

            $updated=$this->Common_Model->update(TBL_USERS_TO_JOBS,
                $new_data,
                array( 'user_id' => (int) $this->input->post('user_id'),'job_id' => (int) $this->input->post('job_id') )
            );
            if($updated)
            {
                $response['message'] = 'Job has been Closed Successfully!';
                $response['success'] = true;
            }
            else $response['message'] = 'Job Closing has been failed!';
            echo json_encode($response);
        }
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Jobs extends CI_Controller {

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
        $this->load->model('admin','Admin_Model');
        $this->load->library('email_handler');
    }
	 
	public function index()
	{
            //,'yh_jobs.assigned_to' => '0'
            $new_data = array(
                    'viewed'=> '1'
            );

            $updated=$this->Common_Model->update(TBL_USERS_TO_JOBS,
                    $new_data,
                    array()
            );
            $data['page_title'] = 'User Jobs';
            $data['jobs'] = $this->Admin_Model->get_user_jobs( array('yh_jobs.job_status' => '1', 'yh_jobs.admin_id'=>$this->session->userdata('admin_id')) );
            $data['grades'] = $this->Admin_Model->get_all_grades(array('grade_status' => '1'));
            $data['status'] = 6;
            $this->load->admin_template('user_jobs',$data);
	}
        
        public function approve_user_job()
        {
            $response = array('success'=>false,'message'=>'');
            $new_data1 = array(
                'assigned_to'=> '1'
            );

            $updated1=$this->Common_Model->update(TBL_JOBS,
                $new_data1,
                array( 'job_id' => (int) $this->input->post('job_id'))
            );
            $new_data = array(
                'approved'=> '1'
            );

            $updated=$this->Common_Model->update(TBL_USERS_TO_JOBS,
                $new_data,
                array( 'user_id' => (int) $this->input->post('user_id'),'job_id' => (int) $this->input->post('job_id') )
            );
            if($updated1 && $updated)
            {
               
                $data['email_data'] = $this->Admin_Model->get_email_data( array('yh_user_to_jobs.user_id' => $this->input->post('user_id'), 'yh_user_to_jobs.job_id'=>$this->input->post('job_id')));
            
                //$data['email'] = $this->emailhandler->sendContactInfo($name,$email,$subject,$email_body);
                $email = $data['email_data']->email;
                $subject = 'Job Approval Notification';
                $job_title = $data['email_data']->job_title;
                $job_desc = $data['email_data']->job_desc;
                $email_body = "Your job has been approved by your Admin.<br/><br/>"."Here are the details:<br/><br/><b>Job Title:</b> $job_title<br/><br/><b>Job Description: </b><br/> $job_desc";
                $data['email'] = $this->email_handler->sendEmail($email,$subject,$email_body); 

                //Send mail 
                if($data['email'])
                {
                    $response['message'] = 'Job has been Approved Successfully!';
                    $response['success'] = true;
                }
                else 
                {
                    $response['message'] = 'Some problem occured during Email Sending!';
                }
            }
            else $response['message'] = 'Job Approval has been failed!';
            echo json_encode($response);
        }
        
        public function reject_user_job()
        {
            $response = array('success'=>false,'message'=>'');
            $new_data = array(
                    'rejected'=> '1',
                    'rejection_reason'=> $this->input->post('rejection_reason')
            );

            $updated=$this->Common_Model->update(TBL_USERS_TO_JOBS,
                    $new_data,
                    array( 'user_id' => (int) $this->input->post('user_id'),'job_id' => (int) $this->input->post('job_id') )
            );
            if($updated)
            {
                    $response['message'] = 'Job has been Rejected Successfully!';
                    $response['success'] = true;
            }
            else $response['message'] = 'Job Rejection has been failed!';
            
            echo json_encode($response);
            
        }
        public function getUserAppliedCount()
        {
            $count = $this->Common_Model->count_rows(TBL_USERS_TO_JOBS, array('viewed' => '0' ) );

            $response['data'] = array();
            $response['data']['jobs_applied_count'] = $count;
            $response['success'] = true;
            
            echo json_encode($response);
        }

        public function ammountPaid($user_job_id)
        {
            $new_data = array(
                    'approved'=> '3'
            );

            $updated=$this->Common_Model->update(TBL_USERS_TO_JOBS,
                    $new_data,
                    array( 'id' => $user_job_id)
            );
            redirect('admin/User_Jobs/index'); 
        }
        
}

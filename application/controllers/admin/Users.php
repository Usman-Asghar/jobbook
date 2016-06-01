<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
            $this->load->model('user','User_Model');
        }
        
	public function index()
	{
            $data['page_title'] = 'Users';
            $data['users'] = $this->User_Model->get_all_users( array('profile_status' => '1','admin_id'=>$this->session->userdata('admin_id')) );
            $data['grades'] = $this->Admin_Model->get_all_grades(array('grade_status' => '1'));
            $data['status'] = 2;
            $this->load->admin_template('users',$data);
	}
        public function add_new(){
            $response = array('success'=>false,'message'=>'');
            if($this->input->post()){
                    $this->form_validation->set_rules('grade_id', 'Job Grade', 'trim|required|max_length[11]');
                    $this->form_validation->set_rules('fname', 'First Name', 'trim|required|ucfirst|max_length[30]');
                    $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[30]');
                    $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[30]');
                    $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
                    
                    if($this->form_validation->run() == FALSE){ 
                            $response['message'] = validation_errors();
                    }else{
                            $errors = array();

                            if(!empty($errors)){
                                    $response['message'] = $errors;
                            }else{

                            $added=$this->Common_Model->add(TBL_USERS,
                                array(
                                        'grade_id'=> $this->security->xss_clean($this->input->post('grade_id')),
                                        'fname'=> $this->security->xss_clean($this->input->post('fname')),
                                        'lname'=> $this->security->xss_clean($this->input->post('lname')),
                                        'email'=> $this->security->xss_clean($this->input->post('email')),
                                        'password'=> $pass = hash("SHA256", xss_clean($this->input->post('password')) . $this->config->item('encryption_key') ),
                                        'profile_status'=> '1',
                                        'admin_id' => $this->session->userdata('admin_id')
                                    )
                            );
                                    if($added){
                                            $response['message'] = 'Record Added Successfully';
                                            $response['success'] = true;
                                    }
                                    else $response['message'] = 'Failed to add the record !';
                            }
                    }
            }
        echo json_encode($response);
	}
        
    public function remove()
    {
        $response = array('success'=>false,'message'=>'');
        if ( $this->Common_Model->delete_with_conditions(TBL_USERS, array('user_id' => $this->input->post('record_id') ) ) ){
                $response['success'] = true;
                $response['message'] = 'Record deleted successfully!';
        }else{
                $response['message'] = 'Unable to delete the record!';
        }
        echo json_encode($response);
    }
    public function update()
    {
        $response = array('success'=>false,'message'=>'');
        if($this->input->post('update')){
                $this->form_validation->set_rules('grade_id', 'Job Grade', 'trim|required|max_length[11]');
                $this->form_validation->set_rules('fname', 'First Name', 'trim|required|ucfirst|max_length[30]');
                $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|max_length[30]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|max_length[30]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
                if($this->form_validation->run() == FALSE){
                        $response['message'] = validation_errors();
                }
                else
                {
                    $new_data = array(
                            'grade_id'=> $this->security->xss_clean($this->input->post('grade_id')),
                            'fname'=> $this->security->xss_clean($this->input->post('fname')),
                            'lname'=> $this->security->xss_clean($this->input->post('lname')),
                            'email'=> $this->security->xss_clean($this->input->post('email')),
                            'password'=> $pass = hash("SHA256", xss_clean($this->input->post('password')) . $this->config->item('encryption_key') ),
                            'profile_status'=> '1',
                            'admin_id' => $this->session->userdata('admin_id')
                    );

                        $updated=$this->Common_Model->update(TBL_USERS,
                                $new_data,
                                array( 'user_id' => (int) $this->input->post('record_id') )
                        );
                        if($updated){
                                $response['message'] = 'Record Updated Successfully';
                                $response['success'] = true;
                        }
                        else $response['message'] = 'Failed to Update the record !';
                }
        }else if($this->input->post('record_id')){

                $record_id = $this->security->xss_clean($this->input->post('record_id'));
                $detail = $this->Common_Model->get_single_row(TBL_USERS, array('user_id' => $record_id ) );

                $response['data'] = array();
                $response['data']['record_id'] = $detail->user_id;
                $response['data']['grade_id_u'] = $detail->grade_id;
                $response['data']['fname_u'] = $detail->fname;
                $response['data']['lname_u'] = $detail->lname;
                $response['data']['email_u'] = $detail->email;
                $response['success'] = true;
        }
        echo json_encode($response);
    }
}

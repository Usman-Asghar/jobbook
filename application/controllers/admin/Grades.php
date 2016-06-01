<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades extends CI_Controller {

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
    }
	 
	public function index()
	{
		
		
		$data['page_title'] = 'Grade Board';
		$data['grades'] = $this->Admin_Model->get_all_grades(array('grade_status' => '1'));
                $data['status'] = 3;
		$this->load->admin_template('grades',$data);
	}
	
	public function add_new(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post()){
			$this->form_validation->set_rules('grade_name', 'Grade Name', 'trim|required|ucfirst|max_length[50]');
			$this->form_validation->set_rules('grade_color', 'Grade Color', 'trim|required|ucfirst|max_length[50]');
			
			if($this->form_validation->run() == FALSE){ 
				$response['message'] = validation_errors();
			}else{
				$errors = array();

				if(!empty($errors)){
					$response['message'] = $errors;
				}else{

					$added=$this->Common_Model->add(TBL_GRADES,
						array(
                                                        'grade_name'=> $this->security->xss_clean($this->input->post('grade_name')),
                                                        'grade_color'=> $this->security->xss_clean($this->input->post('grade_color')),
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
	
	public function update(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post('update')){
			$this->form_validation->set_rules('grade_name', 'Grade Name', 'trim|required|ucfirst|max_length[50]');
                        $this->form_validation->set_rules('grade_color', 'Grade Color', 'trim|required|ucfirst|max_length[50]');
			if($this->form_validation->run() == FALSE){
				$response['message'] = validation_errors();
			}
			else
			{
				$new_data = array(
					'grade_name'=> $this->security->xss_clean($this->input->post('grade_name')),
                                        'grade_color'=> $this->security->xss_clean($this->input->post('grade_color')),
				);
				
				$updated=$this->Common_Model->update(TBL_GRADES,
					$new_data,
					array( 'grade_id' => (int) $this->input->post('record_id') )
				);
				if($updated){
					$response['message'] = 'Record Updated Successfully';
					$response['success'] = true;
				}
				else $response['message'] = 'Failed to Update the record !';
			}
		}else if($this->input->post('record_id')){
			
			$record_id = $this->security->xss_clean($this->input->post('record_id'));
			$detail = $this->Common_Model->get_single_row(TBL_GRADES, array('grade_id' => $record_id ) );

			$response['data'] = array();
			$response['data']['record_id'] = $detail->grade_id;
			$response['data']['grade_name_u'] = $detail->grade_name;
                        $response['data']['grade_color_u'] = $detail->grade_color;
			
			$response['success'] = true;
		}
		echo json_encode($response);
	}
	
	public function remove(){
		$response = array('success'=>false,'message'=>'');
		if ( $this->Common_Model->delete_with_conditions(TBL_GRADES, array('grade_id' => $this->input->post('record_id') ) ) ){
			$response['success'] = true;
			$response['message'] = 'Record deleted successfully!';
		}else{
			$response['message'] = 'Unable to delete the record!';
		}
		echo json_encode($response);
	}
	
}

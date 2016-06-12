<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_XHR extends CI_Controller {
	/**
	 *  
	 *  Licensed by techvando
	 *	Please do not remove this comment
	 *	@author : Yousaf Hassan
	 *	@email : usafhassan@gmail.com
	 *	@date : 25/03/2016
	 */
	 
	function __construct()
        {
            parent::__construct();
		// Ajax Request Confirmation because this controller is only ajax requests handler
                $this->load->helper(array('url', 'form'));
                $fileNames = array();
		if(!$this->session->userdata('admin_logged_in')){
			redirect('admin-login');
			exit();
		}

		$this->load->model('admin','Admin_Model');
        }
	
	public function add_new(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post()){
			$this->form_validation->set_rules('grade_id', 'Job Grade', 'trim|required|max_length[11]');
			$this->form_validation->set_rules('job_title', 'Job Title', 'trim|required|ucfirst|max_length[100]');
			$this->form_validation->set_rules('deadline_date', 'Deadline Date', 'trim|required|max_length[15]');

			$this->form_validation->set_rules('job_desc', 'Job Description', 'trim|required|min_length[5]');
		
			if($this->form_validation->run() == FALSE){ 
				$response['message'] = validation_errors();
			}else{
				$errors = array();

				if(!empty($errors)){
					$response['message'] = $errors;
				}else{

					$added=$this->Common_Model->add_job(TBL_JOBS,
						array(
							  'grade_id'=> $this->security->xss_clean($this->input->post('grade_id')),
							  'job_title'=> $this->security->xss_clean($this->input->post('job_title')),
							  'job_desc'=> $this->security->xss_clean($this->input->post('job_desc')),
							  'start_date'=> date('Y-m-d'),
							  'deadline_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('deadline_date')) ),
							  'date_entered'=> date('Y-m-d'),
							  'admin_id' => $this->session->userdata('admin_id')
							)
						);
                                        if($this->session->userdata('privateFiles'))
                                        {
                                            for($count=0;$count < sizeof($this->session->userdata('privateFiles'));$count++)
                                            {
                                                $file_name = $this->session->userdata('privateFiles')[$count];
                                                $file_name = explode(".",$file_name);
                                                $this->Common_Model->add_job(TBL_JOBS_FILES,
                                                    array(
                                                              'job_id'=> $added,
                                                              'file_address'=> $this->session->userdata('privateFiles')[$count],
                                                              'file_name'=> $file_name[0],
                                                              'is_public'=> 0,
                                                            )
                                                    );
                                            }
                                        }
                                        
                                        if($this->session->userdata('publicFiles'))
                                        {
                                            for($count=0;$count < sizeof($this->session->userdata('publicFiles'));$count++)
                                            {
                                                $file_name = $this->session->userdata('publicFiles')[$count];
                                                $file_name = explode(".",$file_name);
                                                $this->Common_Model->add_job(TBL_JOBS_FILES,
                                                    array(
                                                              'job_id'=> $added,
                                                              'file_address'=> $this->session->userdata('publicFiles')[$count],
                                                              'file_name'=> $file_name[0],
                                                              'is_public'=> 1,
                                                            )
                                                    );
                                            }
                                        }
                                        
					if(!$added)
                                        {
                                            $response['message'] = 'Failed to add the record !';
					}
                                        else 
                                        {
                                            $response['message'] = 'Record Added Successfully';
                                            $response['success'] = true;
                                        }
				}
			}
		}
        echo json_encode($response);
	}
	
	public function update(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post('update')){
			$this->form_validation->set_rules('grade_id', 'Job Grade', 'trim|required|max_length[11]');
			$this->form_validation->set_rules('job_title', 'Job Title', 'trim|required|ucfirst|max_length[100]');
			$this->form_validation->set_rules('deadline_date', 'Deadline Date', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('job_desc', 'Job Description', 'trim|required|min_length[5]');
			if($this->form_validation->run() == FALSE){
				$response['message'] = validation_errors();
			}
			else
			{
				$new_data = array(
					'grade_id'=> $this->security->xss_clean($this->input->post('grade_id')),
					'job_title'=> $this->security->xss_clean($this->input->post('job_title')),
					'job_desc'=> $this->security->xss_clean($this->input->post('job_desc')),
					'deadline_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('deadline_date')) ),
				);
				
				$updated=$this->Common_Model->update(TBL_JOBS,
					$new_data,
					array( 'job_id' => (int) $this->input->post('record_id') )
				);
				if($updated){
					$response['message'] = 'Record Updated Successfully';
					$response['success'] = true;
				}
				else $response['message'] = 'Failed to Update the record !';
			}
		}else if($this->input->post('record_id')){
			
			$record_id = $this->security->xss_clean($this->input->post('record_id'));
			$detail = $this->Common_Model->get_single_row(TBL_JOBS, array('job_id' => $record_id ) );

			$response['data'] = array();
			$response['data']['record_id'] = $detail->job_id;
			$response['data']['grade_id_u'] = $detail->grade_id;
			$response['data']['job_title_u'] = $detail->job_title;
			$response['data']['deadline_date_u'] = $this->common_functions->dateFromSQL($detail->deadline_date);
			$response['data']['job_desc_u'] = $detail->job_desc;
			//$response['data']['assigned_to_u'] = $detail->assigned_to;
			
			$response['success'] = true;
		}
		echo json_encode($response);
	}
	
	public function remove(){
		$response = array('success'=>false,'message'=>'');
		if ( $this->Common_Model->delete_with_conditions(TBL_JOBS, array('job_id' => $this->input->post('record_id') ) ) )
                {
                    $data['all_files'] = $this->Common_Model->get_all_rows(TBL_JOBS_FILES, array('job_id' => $this->input->post('record_id')) );
                    foreach($data['all_files'] as $file):
                        unlink("./uploads/".$file->file_address);
                    endforeach;
                    $this->Common_Model->delete_with_conditions(TBL_JOBS_FILES, array('job_id' => $this->input->post('record_id')) );
                    $response['success'] = true;
                    $response['message'] = 'Record deleted successfully!';
		}
                else
                {
                    $response['message'] = 'Unable to delete the record!';
		}
		echo json_encode($response);
	}
	
	public function get_calendar_jobs()
	{
		$data['jobs'] = $this->Admin_Model->get_all_jobs( array('job_status' => '1') );
                $calendar_events = array();
		
		foreach($data['jobs'] as $job):
			$calendar_events[] = array(
                        'id' => $job->job_id,
                        'title' => 'Grade: '. $job->grade_name. ' Title: '.$job->job_title. ' Description: '.$job->job_desc,
                        'start' => $job->start_date,
                        'end' => $job->deadline_date,
                        'color' => $job->grade_color
                    );
		endforeach;
		
		echo json_encode($calendar_events);
	}
	
	public function get_job_details(){
		echo $this->load->view('record_detail_template',$data, true);
	}
	
	public function get_search_results(){
		$this->load->library("pagination");
		
		$conditions = array('region_id'=>$this->session->userdata('region_id'));
		$like_array = array();
		
		if( $this->input->post('lic_no') )
			$conditions['lic_no'] = $this->security->xss_clean( $this->input->post('lic_no') );
		if( $this->input->post('cnic') )
			$conditions['cnic'] = $this->security->xss_clean( $this->input->post('cnic') );
		/*
		if( $this->input->post('hr_title') && strlen( urldecode( $this->input->post('hr_title') ) ) > 3 )
			$like_array = array('hr_title' => urldecode( $this->input->post('hr_title') ) );
		*/
		if(empty($conditions) && empty($like_array)){
			echo '';
			return;
		}else{
			$data['results'] = $this->Admin_Model->get_search_results($conditions, $like_array);
		}
		
		echo $this->load->view('search_results_template',$data, true);
		
	}

	private function is_image_ok($index,$label)
	{
		$error = false;
		$image_type = getimagesize($_FILES[$index]['tmp_name']);
		
		if(!$image_type){
			$error = "<p>Unable to determine image type of $label</p>";
		}else if(($image_type[2] !== IMAGETYPE_GIF) && ($image_type[2] !== IMAGETYPE_JPEG) && ($image_type[2] !== IMAGETYPE_PNG)){
			$error = "<p>Allowed file types for $label are gif|jpeg|png</p>";
		}else if($_FILES[$index]['error'] !== UPLOAD_ERR_OK) {
			$error = "<p>Error in Uploading $label: ".$_FILES[$index]['error'].'</p>';
		}
		return $error;
	}

	function is_job_ok_4_updation($lic_no){
		// check if there is another record with same license, BUT ignore edited record (Updation purpose)
		if($this->Common_Model->get_single_row(TBL_JOBS, array('job_id !='=>$this->input->post('record_id'), 'job_no'=>$lic_no))){
			$this->form_validation->set_message('is_job_ok_4_updation','Job Number \''.$lic_no.'\' already exists');
			return false;
		}else
			return true;
	}
        
        public function uploadprivateFiles()
	{
            
            $config['upload_path'] = "./uploads";
            $config['allowed_types'] = '*';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("userfile"))
            {
                    $response = $this->upload->display_errors();
            }
            else
            {
                    $response = $this->upload->data();
                    $fileNamesBefore = $this->session->userdata('privateFiles');
                    array_push($fileNamesBefore, $response['client_name']);
                    $this->session->set_userdata('privateFiles', $fileNamesBefore);
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
        public function uploadpublicFiles()
	{
            
            $config['upload_path'] = "./uploads";
            $config['allowed_types'] = '*';
            $config['max_size'] = 0;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("userfile"))
            {
                    $response = $this->upload->display_errors();
            }
            else
            {
                    $response = $this->upload->data();
                    $fileNamesBefore = $this->session->userdata('publicFiles');
                    array_push($fileNamesBefore, $response['client_name']);
                    $this->session->set_userdata('publicFiles', $fileNamesBefore);
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
        
} // Class ends 

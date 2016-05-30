<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class License_XHR extends CI_Controller {

	/**
	 *  
		Licensed by techvando
	 	Please do not remove this comment
		@Author : Yousaf Hassan
		@Email : usafhassan@gmail.com
		Date : 25/01/2016
	 */
	 
	function __construct()
    {
        parent::__construct();
		// Ajax Request Confirmation because this controller is only ajax requests handler
		if(!$this->input->is_ajax_request()){
			show_404();
			exit;
		}
		
		if(!$this->session->userdata('user_logged_in')){
			redirect('main');
			exit();
		}

		$this->load->model('admin','Admin_Model');
    }
	
	public function add_new(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post()){
			$this->form_validation->set_rules('lic_no', 'License Number', 'trim|required|max_length[30]|is_unique['.TBL_LICENSE.'.lic_no]');
			if($this->input->post('old_issue_date'))
					$this->form_validation->set_rules('old_lic_no', 'Old License Number', 'trim|required|max_length[30]');
			else
				$this->form_validation->set_rules('old_lic_no', 'Old License Number', 'trim|max_length[30]');
			$this->form_validation->set_rules('person_name', 'Person Name', 'trim|required|ucfirst|max_length[50]');
			$this->form_validation->set_rules('father_name', 'Father Name', 'trim|required|ucfirst|max_length[50]');
			$this->form_validation->set_rules('cnic', 'CNIC', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('postal_address', 'Postal Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('blood_group', 'Blood Group', 'trim|required|numeric');
			$this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');

			$this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('expiry_date', 'Date of Expiry', 'trim|required|max_length[15]');
			if($this->input->post('old_lic_no'))
				$this->form_validation->set_rules('old_issue_date', 'Old License Issue Date', 'trim|required|max_length[15]');
			else
				$this->form_validation->set_rules('old_issue_date', 'Old License Issue Date', 'trim|max_length[15]');
			$this->form_validation->set_rules('remarks','Remarks', 'trim');

			if(!$this->input->post('person_photo') && !$this->input->post('person_photo_manual')){
				$this->form_validation->set_rules('person_photo', 'Photo', 'required');
			}
		
			if($this->form_validation->run() == FALSE){ 
				$response['message'] = validation_errors();
			}else{
				$errors = array();
				
				if(empty($_FILES['person_thumb']['name'])){
					$errors[] = '<p>The Upload Thumb field is required.</p>';
				}else if( $result = $this->is_image_ok('person_thumb', 'Thumb') ){
					$errors[] = $result;
				}

				if(!empty($errors)){
					$response['message'] = $errors;
				}else{

					$person_thumb = base64_encode( file_get_contents($_FILES['person_thumb']['tmp_name']) );

					if($this->input->post('person_photo'))
						$filename = $this->common_functions->upload_photo($this->input->post('person_photo'));
					else{
						$filename = md5(uniqid(rand(), true)).'.jpg';
						$config['allowed_types'] = '*';
						$config['upload_path'] = USER_PHOTO_UPLOAD_PATH;
						$config['file_name'] = $filename;
						$this->load->library('upload', $config);
						$this->upload->do_upload('person_photo_manual');
					}
					
					$ok=$this->Common_Model->add(TBL_LICENSE,
						array(
							  'region_id'=>$this->session->userdata('region_id'),
							  'lic_no'=> $this->security->xss_clean($this->input->post('lic_no')),
							  'old_lic_no'=> $this->security->xss_clean($this->input->post('old_lic_no')),
							  'person_name'=> $this->security->xss_clean($this->input->post('person_name')),
							  'father_name'=> $this->security->xss_clean($this->input->post('father_name')),
							  'cnic'=>$this->security->xss_clean($this->input->post('cnic')),
							  'person_photo' => $filename,
							  'person_thumb' => $person_thumb,
							  'dob'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('dob')) ),
							  'postal_address'=> ucfirst( $this->security->xss_clean($this->input->post('postal_address')) ),
							  'permanent_address'=> $this->security->xss_clean($this->input->post('permanent_address')),
							  'blood_group'=> $this->security->xss_clean($this->input->post('blood_group')),
							  'category'=> $this->security->xss_clean($this->input->post('category')),
							  'issue_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('issue_date')) ),
							  'expiry_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('expiry_date')) ),
							  'old_issue_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('old_issue_date')) ),
							  'remarks'=> $this->security->xss_clean($this->input->post('remarks')),
							  'date_entered' => date('Y-m-d')
							)
						);
					if($ok){
						$response['message'] = 'Record Added Successfully';
						$record_id = $this->Common_Model->last_insert_id();
						$response['print_front_url'] = base_url('license/print-front/'.$record_id);
						$response['print_back_url'] = base_url('license/print-back/'.$record_id);
						$response['success'] = true;
					}
					else $response['message'] = 'Failed to add the record !';
				}
			}
		}
//		echo json_encode($response,JSON_UNESCAPED_SLASHES);
        echo str_replace('\\n','',json_encode($response));
	}
	
	public function update(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post('update')){
			$this->form_validation->set_rules('lic_no', 'License Number', 'trim|required|max_length[30]|callback_is_license_ok_4_updation');
			if($this->input->post('old_issue_date'))
				$this->form_validation->set_rules('old_lic_no', 'Old License Number', 'trim|required|max_length[30]');
			else
				$this->form_validation->set_rules('old_lic_no', 'Old License Number', 'trim|max_length[30]');

			$this->form_validation->set_rules('person_name', 'Person Name', 'trim|required|ucfirst|max_length[50]');
			$this->form_validation->set_rules('father_name', 'Father Name', 'trim|required|ucfirst|max_length[50]');
			$this->form_validation->set_rules('cnic', 'CNIC', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('postal_address', 'Postal Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('blood_group', 'Blood Group', 'trim|required|numeric');
			$this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');

			$this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('expiry_date', 'Date of Expiry', 'trim|required|max_length[15]');
			if($this->input->post('old_lic_no'))
				$this->form_validation->set_rules('old_issue_date', 'Old License Issue', 'trim|required|max_length[15]');
			else
				$this->form_validation->set_rules('old_issue_date', 'Old License Issue Date', 'trim|max_length[15]');
			$this->form_validation->set_rules('remarks','Remarks', 'trim');

			$this->form_validation->set_rules('person_photo', 'Photo', 'required');

			if($this->form_validation->run() == FALSE){
				$response['message'] = validation_errors();
			}else{
				//$filename = $this->common_functions->upload_photo($this->input->post('person_photo'));
				$previous = $this->Common_Model->get_single_row(TBL_LICENSE,array('lic_id'=>$this->input->post('id')));
				$new_data = array(
						  'lic_no'=> $this->security->xss_clean($this->input->post('lic_no')),
						  'old_lic_no'=> $this->security->xss_clean($this->input->post('old_lic_no')),
						  'person_name'=> $this->security->xss_clean($this->input->post('person_name')),
						  'father_name'=> $this->security->xss_clean($this->input->post('father_name')),
						  'cnic'=>$this->security->xss_clean($this->input->post('cnic')),
						  'dob'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('dob')) ),
						  'postal_address'=> ucfirst( $this->security->xss_clean($this->input->post('postal_address')) ),
						  'permanent_address'=> $this->security->xss_clean($this->input->post('permanent_address')),
						  'blood_group'=> $this->security->xss_clean($this->input->post('blood_group')),
						  'category'=> $this->security->xss_clean($this->input->post('category')),
						  'issue_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('issue_date')) ),
						  'expiry_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('expiry_date')) ),
						  'old_issue_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('old_issue_date')) ),
						  'remarks'=> $this->security->xss_clean($this->input->post('remarks'))
				);
				$filename = str_replace(USER_PHOTO_UPLOAD_PATH, '', $this->input->post('person_photo'));
				if($previous->person_photo!=$filename){
					@unlink(USER_PHOTO_UPLOAD_PATH.$previous->person_photo);
					$filename = $this->common_functions->upload_photo($filename);
					$new_data['person_photo'] = $filename;
				}
				
				$updated=$this->Common_Model->update(TBL_LICENSE,
					$new_data,
					array( 'lic_id' => (int) $this->input->post('id') )
				);
				if($updated){
					$response['message'] = 'Record Updated Successfully';
					$response['success'] = true;
				}
				else $response['message'] = 'Failed to Update the record !';
			}
		}else if($this->input->post('record_id')){
			
			$record_id = $this->security->xss_clean($this->input->post('record_id'));
			$detail = $this->Admin_Model->get_lic_details( array('lic_id' => $record_id ) );

			$response['data'] = array();
			$response['data']['lic_id'] = $detail->lic_id;
			$response['data']['lic_no'] = $detail->lic_no;
			$response['data']['old_lic_no'] = $detail->old_lic_no;
			$response['data']['person_name'] = $detail->person_name;
			$response['data']['father_name'] = $detail->father_name;
			$response['data']['cnic'] = $detail->cnic;
			$path = USER_PHOTO_UPLOAD_PATH.$detail->person_photo;
			if(!file_exists($path) || !$detail->person_photo)
				$path = assets_url('img/person-placeholder.jpg');
			$response['data']['person_photo'] = $path;
			$response['data']['dob'] = $this->common_functions->dateFromSQL($detail->dob);
			$response['data']['postal_address'] = $detail->postal_address;
			$response['data']['permanent_address'] = $detail->permanent_address;
			$response['data']['blood_group'] = $detail->blood_group;
			$response['data']['category'] = $detail->category;
			$response['data']['issue_date'] = $this->common_functions->dateFromSQL($detail->issue_date);
			$response['data']['expiry_date'] = $this->common_functions->dateFromSQL($detail->expiry_date);
			$response['data']['old_issue_date'] = $this->common_functions->dateFromSQL($detail->old_issue_date);
			$response['data']['remarks'] = $detail->remarks;
			
			$response['success'] = true;
		}
		echo json_encode($response);
	}
	
	public function remove(){
		$response = array('success'=>false,'message'=>'');
		if ( $this->Common_Model->delete_with_conditions(TBL_LICENSE, array('lic_id' => $this->input->post('record_id') ) ) ){
			$response['success'] = true;
			$response['message'] = 'Record deleted successfully!';
		}else{
			$response['message'] = 'Unable to delete the record!';
		}
		echo json_encode($response);
	}
	
	public function duplicate(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post()){
			$this->form_validation->set_rules('lic_id', 'Secret Parameter', 'numeric|required');
			$this->form_validation->set_rules('postal_address', 'Postal Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('expiry_date', 'Date of Expiry', 'trim|required|max_length[15]');

			$this->form_validation->set_rules('remarks','Remarks', 'trim');

			if($this->form_validation->run() == FALSE){ 
				$response['message'] = validation_errors();
			}else{
				$parent = $this->Common_Model->get_single_row(TBL_LICENSE, array('lic_id'=>$this->security->xss_clean($this->input->post('lic_id')) ) );
				$ok=$this->Common_Model->add(TBL_LICENSE,
					array(
						  'lic_no'=> $parent->lic_no,
						  'region_id'=>$this->session->userdata('region_id'),
						  'old_lic_no'=> $parent->old_lic_no,
						  'person_name'=> $parent->person_name,
						  'father_name'=> $parent->father_name,
						  'person_photo' => $parent->person_photo,
						  'person_thumb' => $parent->person_thumb,
						  'cnic'=>$parent->cnic,
						  'dob'=> $parent->dob,						  
						  'postal_address'=> $this->security->xss_clean($this->input->post('postal_address')),
						  'permanent_address'=> $this->security->xss_clean($this->input->post('permanent_address')),
						  'blood_group'=> $parent->blood_group,
						  'category'=> $parent->category,
						  'issue_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('issue_date')) ),
						  'expiry_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('expiry_date')) ),
						  'remarks'=> $this->security->xss_clean($this->input->post('remarks')),
						  'date_entered' => date('Y-m-d'),
						  'lic_status' => '4' // Duplicate
						)
					);
				if($ok){
					$response['message'] = 'License Duplicated Successfully';
					$record_id = $this->Common_Model->last_insert_id();
					$response['print_front_url'] = base_url('license/print-front/'.$record_id);
					$response['print_back_url'] = base_url('license/print-back/'.$record_id);
					$response['success'] = true;
				}
				else $response['message'] = 'Failed to duplicate the license !';
			}
		}
		echo json_encode($response);
	}

	public function replace(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post()){
			$this->form_validation->set_rules('lic_id', 'Secret Parameter', 'numeric|required');
			$this->form_validation->set_rules('postal_address', 'Postal Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('expiry_date', 'Date of Expiry', 'trim|required|max_length[15]');

			$this->form_validation->set_rules('remarks','Remarks', 'trim');

			if($this->form_validation->run() == FALSE){ 
				$response['message'] = validation_errors();
			}else{
				$parent = $this->Common_Model->get_single_row(TBL_LICENSE, array('lic_id'=>$this->security->xss_clean($this->input->post('lic_id')) ) );
				$ok=$this->Common_Model->add(TBL_LICENSE,
					array(
						  'lic_no'=> $parent->lic_no,
						  'region_id'=>$this->session->userdata('region_id'),
						  'old_lic_no'=> $parent->old_lic_no,
						  'person_name'=> $parent->person_name,
						  'father_name'=> $parent->father_name,
						  'person_photo' => $parent->person_photo,
						  'person_thumb' => $parent->person_thumb,
						  'cnic'=>$parent->cnic,
						  'dob'=> $parent->dob,
						  'postal_address'=> $this->security->xss_clean($this->input->post('postal_address')),
						  'permanent_address'=> $this->security->xss_clean($this->input->post('permanent_address')),
						  'blood_group'=> $parent->blood_group,
						  'category'=> $parent->category,
						  'issue_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('issue_date')) ),
						  'expiry_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('expiry_date')) ),
						  'remarks'=> $this->security->xss_clean($this->input->post('remarks')),
						  'date_entered' => date('Y-m-d'),
						  'lic_status' => '3'
						)
					);
				if($ok){
					$response['message'] = 'License Replaced Successfully';
					$record_id = $this->Common_Model->last_insert_id();
					$response['print_front_url'] = base_url('license/print-front/'.$record_id);
					$response['print_back_url'] = base_url('license/print-back/'.$record_id);
					$response['success'] = true;
				}
				else $response['message'] = 'Failed to replace the license !';
			}
		}
		echo json_encode($response);
	}

	public function renew(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post()){
			$this->form_validation->set_rules('lic_id', 'Secret Parameter', 'numeric|required');
			$this->form_validation->set_rules('postal_address', 'Postal Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('expiry_date', 'Date of Expiry', 'trim|required|max_length[15]');

			$this->form_validation->set_rules('remarks','Remarks', 'trim');
			if(!$this->input->post('person_photo') && !$this->input->post('person_photo_manual')){
				$this->form_validation->set_rules('person_photo', 'Photo', 'required');
			}

			if($this->form_validation->run() == FALSE){ 
				$response['message'] = validation_errors();
			}else{

				if($this->input->post('person_photo'))
					$filename = $this->common_functions->upload_photo($this->input->post('person_photo'));
				else{
					$filename = base64_encode( file_get_contents($_FILES['person_photo_manual']['tmp_name']) );
					$filename = $this->common_functions->upload_photo($filename);
				}


				$parent = $this->Common_Model->get_single_row(TBL_LICENSE, array('lic_id'=>$this->security->xss_clean($this->input->post('lic_id')) ) );
				$ok=$this->Common_Model->add(TBL_LICENSE,
					array(
						  'lic_no'=> $parent->lic_no,
						  'region_id'=>$this->session->userdata('region_id'),
						  'old_lic_no'=> $parent->old_lic_no,
						  'person_name'=> $parent->person_name,
						  'father_name'=> $parent->father_name,
						  'person_photo' => $filename,
						  'person_thumb' => $parent->person_thumb,
						  'cnic'=>$parent->cnic,
						  'dob'=> $parent->dob,
						  'postal_address'=> $this->security->xss_clean($this->input->post('postal_address')),
						  'permanent_address'=> $this->security->xss_clean($this->input->post('permanent_address')),
						  'blood_group'=> $parent->blood_group,
						  'category'=> $parent->category,
						  'issue_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('issue_date')) ),
						  'expiry_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('expiry_date')) ),
						  'remarks'=> $this->security->xss_clean($this->input->post('remarks')),
						  'date_entered' => date('Y-m-d'),
						  'lic_status' => '2'
						)
					);
				if($ok){
					$response['message'] = 'License Renewed Successfully';
					$record_id = $this->Common_Model->last_insert_id();
					$response['print_front_url'] = base_url('license/print-front/'.$record_id);
					$response['print_back_url'] = base_url('license/print-back/'.$record_id);
					$response['success'] = true;
				}
				else $response['message'] = 'Failed to renew the license !';
			}
		}
		echo json_encode($response);
	}

	public function upgrade(){
		$response = array('success'=>false,'message'=>'');
		if($this->input->post()){
			$this->form_validation->set_rules('lic_id', 'Secret Parameter', 'numeric|required');
			$this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');
			$this->form_validation->set_rules('postal_address', 'Postal Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[300]');
			$this->form_validation->set_rules('category', 'Category', 'trim|required|numeric');
			$this->form_validation->set_rules('issue_date', 'Issue date', 'trim|required|max_length[15]');
			$this->form_validation->set_rules('expiry_date', 'Date of Expiry', 'trim|required|max_length[15]');

			$this->form_validation->set_rules('remarks','Remarks', 'trim');

			if($this->form_validation->run() == FALSE){ 
				$response['message'] = validation_errors();
			}else{
				$parent = $this->Common_Model->get_single_row(TBL_LICENSE, array('lic_id'=>$this->security->xss_clean($this->input->post('lic_id')) ) );
				$ok=$this->Common_Model->add(TBL_LICENSE,
					array(
						  'lic_no'=> $parent->lic_no,
						  'region_id'=>$this->session->userdata('region_id'),
						  'old_lic_no'=> $parent->old_lic_no,
						  'person_name'=> $parent->person_name,
						  'father_name'=> $parent->father_name,
						  'person_photo' => $parent->person_photo,
						  'person_thumb' => $parent->person_thumb,
						  'cnic'=>$parent->cnic,
						  'dob'=> $parent->dob,
						  'postal_address'=> $this->security->xss_clean($this->input->post('postal_address')),
						  'permanent_address'=> $this->security->xss_clean($this->input->post('permanent_address')),
						  'blood_group'=> $parent->blood_group,
						  'category'=> $this->security->xss_clean($this->input->post('category')),
						  'issue_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('issue_date')) ),
						  'expiry_date'=> $this->common_functions->dateToSQL( $this->security->xss_clean($this->input->post('expiry_date')) ),
						  'remarks'=> $this->security->xss_clean($this->input->post('remarks')),
						  'date_entered' => date('Y-m-d'),
						  'lic_status' => '5'
						)
					);
				if($ok){
					$response['message'] = 'License Upgrade Successfully';
					$record_id = $this->Common_Model->last_insert_id();
					$response['print_front_url'] = base_url('license/print-front/'.$record_id);
					$response['print_back_url'] = base_url('license/print-back/'.$record_id);
					$response['success'] = true;
				}
				else $response['message'] = 'Failed to upgrade the license !';
			}
		}
		echo json_encode($response);
	}

	public function get_lic_details(){
		$record_id = $this->security->xss_clean($this->input->post('record_id'));
		// Check if the user has the rights!
		if(!$detail=$this->Admin_Model->get_lic_details(array('lic_id'=>$record_id,'region_id'=>$this->session->userdata('region_id')))){
			$this->output->set_header(404);
			show_404();
		}
		
		$data['detail'] = $this->Admin_Model->get_lic_details( array('lic_id' => $record_id ) );
		
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

	function is_license_ok_4_updation($lic_no){
		// check if there is another record with same license, BUT ignore edited record (Updation purpose)
		if($this->Common_Model->get_single_row(TBL_LICENSE, array('lic_id !='=>$this->input->post('id'), 'lic_no'=>$lic_no))){
			$this->form_validation->set_message('is_license_ok_4_updation','License Number \''.$lic_no.'\' already exists');
			return false;
		}else
			return true;
	}
} // Class ends 

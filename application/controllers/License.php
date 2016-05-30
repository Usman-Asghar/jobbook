<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class License extends CI_Controller {

	/**
	 *  
		Licensed by techvando
	 	Please do not remove this comment
		@Author : Yousaf Hassan
		@Email : usafhassan@gmail.com
		Date : 23/01/2016
	 */
	 
	function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('user_logged_in')){
			redirect('main');
		}
		$this->load->model('admin','Admin_Model');
    }

	public function index()
	{	
		redirect('home');
	}
	
	public function print_license_front($lic_id)
	{
		// Check if the user has the rights!
		if(!$detail=$this->Admin_Model->get_lic_details(array('lic_id'=>$lic_id,'region_id'=>$this->session->userdata('region_id')))){
			$this->output->set_header(404);
			show_404();
		}
		$data['detail'] = $detail;
		$this->load->view('print_front',$data);
	}

	public function print_license_back($lic_id)
	{
		// Check if the user has the rights!
		if(!$detail=$this->Admin_Model->get_lic_details(array('lic_id'=>$lic_id,'region_id'=>$this->session->userdata('region_id')))){
			$this->output->set_header(404);
			show_404();
		}
		$data['detail'] = $detail;
		$this->load->view('print_back',$data);
	}

	public function duplicate($lic_id)
	{
		// Check if the user has the rights!
		if(!$detail=$this->Admin_Model->get_lic_details(array('lic_id'=>$lic_id,'region_id'=>$this->session->userdata('region_id')))){
			$this->output->set_header(404);
			show_404();
		}
		$data['page_title'] = 'Duplicate License';
		$this->load_header($data);
		$data['detail'] = $detail;
		$this->load->view('duplicate',$data);
		$this->load_footer();
	}

	public function replace($lic_id)
	{
		// Check if the user has the rights!
		if(!$detail=$this->Admin_Model->get_lic_details(array('lic_id'=>$lic_id,'region_id'=>$this->session->userdata('region_id')))){
			$this->output->set_header(404);
			show_404();
		}
		$data['page_title'] = 'Replace License';
		$this->load_header($data);
		$data['detail'] = $detail;
		$this->load->view('replace',$data);
		$this->load_footer();
	}

	public function renew($lic_id)
	{
		// Check if the user has the rights!
		if(!$detail=$this->Admin_Model->get_lic_details(array('lic_id'=>$lic_id,'region_id'=>$this->session->userdata('region_id')))){
			$this->output->set_header(404);
			show_404();
		}

		$data['page_title'] = 'Renew License';
		$this->load_header($data);
		$data['detail'] = $detail;
		$this->load->view('renew',$data);
		$this->load_footer();
	}


	public function upgrade($lic_id)
	{
		// Check if the user has the rights!
		if(!$detail=$this->Admin_Model->get_lic_details(array('lic_id'=>$lic_id,'region_id'=>$this->session->userdata('region_id')))){
			$this->output->set_header(404);
			show_404();
		}

		$data['page_title'] = 'Upgrade License';
		$this->load_header($data);
		$data['detail'] = $detail;
		$data['categories'] = $this->Common_Model->get_all_rows_with_conditions(TBL_CATS, array('cat_status'=>'1') );
		$this->load->view('upgrade',$data);
		$this->load_footer();
	}


	
	
	private function load_header($data)
	{
		$this->load->view('includes/top', $data);
		$this->load->view('includes/header');
	}
	
	private function load_footer()
	{
		$this->load->view('includes/footer');
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chats extends CI_Controller {

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
        $this->load->model('chat','Chat_Model');
    }
	 
	public function index()
	{	
		$data['page_title'] = 'Chat'; 
        $data['chats'] = $this->Chat_Model->get_all_chats(array(TBL_CHATS.'.user_id' => $this->session->userdata('user_id')));
        $data['status'] = 6;
        $this->load->front_template('chat',$data);
	}

	public function send()
    {
        if($this->input->is_ajax_request()) {
            $user_id = $this->session->userdata('user_id');
            $message = $this->input->post('message');

            $response = $this->Chat_Model->send_chat( array('user_id' => $user_id, 'message' => $message, 'is_admin' => 0, 'sent' => 1) );
            if($response) {
                echo json_encode(array('success' => true, 'message' => 'Message has been sent successfully.'));
            }
            else {
                echo json_encode(array('success' => false, 'message' => 'An error eccurred.'));
            }
        }
        else
            show_404();
    }
	
}

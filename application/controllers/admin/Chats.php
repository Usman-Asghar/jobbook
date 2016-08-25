<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chats extends CI_Controller {

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
            $this->load->model('chat','Chat_Model');
            $this->load->library('email_handler');
        }
        
	public function index()
	{
            $data['page_title'] = 'Chat';
            $data['users'] = $this->User_Model->get_all_users( array('profile_status' => '1') );
            $data['status'] = 7;
            $this->load->admin_template('chat',$data);
	}

    public function conversation($user_id)
    {
        $data['page_title'] = 'Chat';
        $data['chats'] = $this->Chat_Model->get_all_chats( array(TBL_CHATS.'.user_id' => $user_id) );
        $data['status'] = 7;
        $this->load->admin_template('conversation',$data);
    }

    public function send()
    {
        if($this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            $message = $this->input->post('message');

            $response = $this->Chat_Model->send_chat( array('user_id' => $user_id, 'message' => $message, 'is_admin' => 1, 'sent' => 1) );
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

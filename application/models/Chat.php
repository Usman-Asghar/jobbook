<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_all_chats($conditions)
	{
        $this->db->select(TBL_CHATS.'.*, fname, lname');
		$this->db->from(TBL_CHATS);
        $this->db->join(TBL_USERS, TBL_CHATS.'.user_id = '.TBL_USERS.'.user_id', 'inner');
		$this->db->where($conditions);
		return $this->db->get()->result();
	}

    public function send_chat($chat)
    {
        return $this->db->insert(TBL_CHATS, $chat);
    }
        
}// end of model

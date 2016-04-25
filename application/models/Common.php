<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model {
		
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}	
	
	public function add($table,$data){ //Insert data in given table
		if($this->db->insert($table,$data)) return true;
		else return false;
	}
	
	public function update($table,$data,$conditions){
		$this->db->where($conditions);
		if( $this->db->update($table,$data) ) return true;
		else return false;
	}
	
	public function count_rows($table,$conditions=array()){//to get Total rows in a table using optional where condition
		$this->db->where($conditions);
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	
	public function count_rows_with_conditions_NOT_IN($table,$column,$values){//to get Total rows in a table using where condition
		$this->db->where_not_in($column,$values);
		$this->db->from($table);
		return $this->db->count_all_results();
	}
	
	public function get_limited_rows_withorder_with_condition($table,$limit,$offset,$key,$orderby,$condtions){ //to get limited rows with pagination offset and limitation with order by also as well as some condition base etc
		$this->db->where($condtions); 
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->order_by($key,$orderby);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	public function get_limited_rows_withorder_with_conditions_NOT_IN($table,$limit,$offset,$key,$orderby,$column,$values){ //to get limited rows with pagination offset and limitation with order by also as well as some condition base etc
		$this->db->where_not_in($column,$values); 
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->order_by($key,$orderby);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	public function get_all_rows($table){
		return $this->db->get($table)->result();
	}
	public function get_all_rows_where_in($table,$col,$array){
		return $this->db->where_in($col,$array)->get($table)->result();
	}
	
	public function get_all_rows_NOT_IN($table,$column,$values){
		return $this->db->where_not_in($column,$values)->get($table)->result();
	}
	
	public function get_all_rows_with_conditions($table,$conditions){
		return $this->db->get_where($table,$conditions)->result();
	}
	
	function join_2_tables($table1,$table2,$selection_cols,$join_col1,$join_col2,$conditions=array(),$order_col,$join_type='left'){
		$this->db->select($selection_cols);
		$this->db->from($table1.' t1');
		$this->db->join($table2.' t2', 't1.'.$join_col1.' = t2.'.$join_col2, $join_type);
		$this->db->where($conditions);
		$this->db->order_by($order_col,'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	function join_3_tables($t1,$t2,$t3,$selection_cols,$join_col2,$join_col3,$conditions=array(),$join_type='left'){
		$this->db->select($selection_cols);
		$this->db->from($t1.' t1');
		$this->db->join($t2.' t2', 't1.'.$join_col2.' = t2.'.$join_col2, $join_type);
		$this->db->join($t3.' t3', 't1.'.$join_col3.' = t3.'.$join_col3, $join_type);
		$this->db->where($conditions);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_single_row($table, $conditions=array()){
		return $this->db->get_where($table, $conditions)->row();
	}
	
	// all conditions as OR
	public function get_single_row_AND_OR($table, $AND_conditions=array(), $OR_conditions=array()){
		$this->db->where($AND_conditions);
		$this->db->or_where($OR_conditions);
		return $this->db->get($table)->row();
	}
	
	public function delete_with_conditions($table, $conditions){ //delete specific record(s) from the table
		if($this->db->delete($table,$conditions))
			return true;
		else return false;
	}
	
	public function last_insert_id(){
		return $this->db->insert_id();
	}
	
}// end of model

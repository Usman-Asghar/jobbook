<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Licensed by techvando
	Please do not remove this comment
	@Author : Yousaf Hassan
	@Email : usafhassan@gmail.com
	Date : 22/01/2016

This file contains all common functions that may be use in all over the application
 */
class Common_functions{
	
	public function dateToSQL($date){
		if(!$date) return '';
		$str = explode('/',$date);
      	return $str[2].'-'.$str[0].'-'.$str[1];
	}
	
	public function dateFromSQL($date){
		if(!$date) return '';
		$str = explode('-',$date);
		return $str[2].'/'.$str[0].'/'.$str[1];
   }
   
   public function dateFromSQL_Public($date){
		if(!$date) return '';
		return date('dS F Y', strtotime($date));
   }
	
	public function calculate_age($dob){
		$birth_year = current( explode('-',$dob) );
		return ( date('Y') - $birth_year );
	}
	
	public function convert_lic_status($status_code){
		if($status_code=='1')
			return 'New';
		if($status_code=='2')
			return 'Replace';
		else
			return 'Duplciate';
	}
	
	public function convert_lic_status_html($status_code){
		if($status_code=='1')
			return '<span class="label label-success">New</span>';
		if($status_code=='2')
			return '<span class="label label-info">Renew</span>';
		if($status_code=='3')
			return '<span class="label label-primary">Replace</span>';
		else
			return '<span class="label label-warning">Duplciate</span>';
	}

	public function upload_photo($photo,$update=false){
		$photo = urldecode($photo);
		$photo = base64_decode( str_replace('data:image/png;base64,', '', $photo) );
		$filename = md5(uniqid(rand(), true)).'.jpg';
		$upload_dir = USER_PHOTO_UPLOAD_PATH.$filename;

		file_put_contents($upload_dir,$photo);
		return $filename;
	}

	public function encode_image($data){
		$decoded = base64_decode($data);
		if($decoded)
			return base64_encode($decoded);
		else return base64_encode($data);
	}
	
	public function style_pagination(){
		$config = array();
		
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		
		return $config;
	}

}//End of class

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if ( ! function_exists('assets_url()'))
    {
       function assets_url($param='')
       {
          return base_url('assets/'.$param);
       }
    }
	 
	if ( ! function_exists('link_tag()'))
    {
		function link_tag($ref, $live=false)
        {
			if($live)
				return '<link href="'.$ref.'" rel="stylesheet" type="text/css" >
			';
			else
				return '<link href="'.assets_url($ref).'" rel="stylesheet" type="text/css" >
			';		
        }
	 
	}
	 
	if ( ! function_exists('script_tag()'))
    {
		function script_tag($src, $live=false)
        {
			if($live)
				return '<script src="'.$src.'" type="text/javascript" ></script>
			';
			else
				return '<script src="'.assets_url($src).'" type="text/javascript" ></script>
			';
        }
	}
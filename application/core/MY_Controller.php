<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		
		// Script
		$this->disp_data['script']			= "";
		
		// redirect
		$this->disp_data['redirect']		= "";
		
		// Change Error delimiters
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		// Set Code
		$this->code	= $this->config->item('code');
		$this->disp_data['code']	= $this->code;
		
	}
	
	/*************************************************************
	* User List
	* avertiser/index/page
	* 
	**************************************************************/
	function page($function_name, $offset = 0){
		$this->disp_data['page_title']	.= "一覧";
		$model = ucfirst($function_name);
		
		// limit & totak & offset
		$limit	= 10;
		$total	= $this->$model->get_PageCountAll();
		$offset	= is_numeric($offset)? (int) $offset : 0 ;
		$offset	= ((int) $total <  $offset )? (int) $total - $limit : $offset;
		
		// get List
		$this->disp_data['list']	= $this->$model->get_PageList($limit, $offset);
		
		// Make Pagenation
		$this->disp_data['pagination']	= $this->_setPage("/tool/{$function_name}/page", $limit, $total);
		
		// Data output
		$this->print_wrapper_after_login("{$function_name}/index");
		
		//
		return NULL;
	}
	
	/*************************************************************
	* set Pagenate
	*
	**************************************************************/
	protected function _setPage($url, $limit, $total){ 
		$this->load->library('pagination');
		
		$config['base_url']			= $url;
		$config['total_rows']		= $total;
		$config['per_page']			= $limit;
		$config['num_links'] 		= 4;
		
		$this-> pagination -> initialize($config);
		
		return $this->pagination->create_links();
	}
	
	/*
	 * ------------------------------------------------------
 	 *  print wrapper(after login)
 	 * ------------------------------------------------------
 	*/
	public function print_wrapper($view){
		$this->print_header();
		$this->print_cmn_parts();
		$this->load->view($view);
		$this->print_footer();
	}
	
	/*
	 * ------------------------------------------------------
 	 *  print header
 	 * ------------------------------------------------------
 	*/
	public function print_header(){
		$this->load->view('parts/header', $this->disp_data);
	}
	
	/*
	 * ------------------------------------------------------
 	 *  print common parts
 	 * ------------------------------------------------------
 	*/
	public function print_cmn_parts(){
		$this->load->view('parts/cmn_parts.php', $this->disp_data);
	}
	
	/*
 	 * ------------------------------------------------------
 	 *  print footer
	 * ------------------------------------------------------
	 */
	 public function print_footer(){
		$this->load->view('parts/footer', $this->disp_data);
	}
}
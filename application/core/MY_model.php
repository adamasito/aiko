<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_model extends CI_Model{
	protected $table_name 			= '';
	
	function __construct(){
		parent::__construct();
		$ci =& get_instance();
//		$ci->load->database();
	}
}

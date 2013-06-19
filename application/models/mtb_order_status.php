<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mtb_order_status extends CI_Model{
	// Set Tabke Nasme
	protected $table_name 		= 'mtb_order_status';
	
	function __construct(){
		parent::__construct();
		$ci =& get_instance();
	}
	
	/*************************************************************
	* 
	* Get Mtb_order_status list
	* 
	**************************************************************/
	function get_Mtb_order_status_list(){
		$this->db->from($this->table_name);
		
		//
		return $this->db->get()->result_array();
	}
	
	/*************************************************************
	* 
	* Get Mtb_order_status by id
	* 
	**************************************************************/
	function get_Mtb_order_status_by_id($id){
		$this->db->from($this->table_name);
		$this->db->where('id', $id);
		//
		return $this->db->get()->result_array();
	}
	
}

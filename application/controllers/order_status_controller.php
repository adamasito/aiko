<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order_status_controller extends MY_Controller {

	function __construct(){
		parent::__construct();
		
		$this->disp_data['page_title']	= '注文ステータス';
		
		// Load model
		$this->load->model('Mtb_order_status', '', true);
		$this->load->model('Dtb_order');
	}
	
	/*************************************************************
	* Update Dtb_order status
	* order_status/index
	* 
	**************************************************************/
	function index(){
		// get Mtb_order_status
		$mtb_order_status	= $this->Mtb_order_status->get_Mtb_order_status_list();
		
		$this->disp_data['mtb_order_status']	= $mtb_order_status;
		
		// Data output
		$this->print_wrapper("order_status/index");
	}
	
	/*************************************************************
	* Update  Dtb_order status
	* order_status/status_upload
	* 
	**************************************************************/
	function status_upload(){
		$this->disp_data['page_title']	.= "更新";
		
		// get Mtb_order_status
		$mtb_order_status	= $this->Mtb_order_status->get_Mtb_order_status_list();
		$this->disp_data['mtb_order_status']	= $mtb_order_status;
		
		// set Validation Rules
		$this->_set_Validation();
		
		if ($this->form_validation->run() == FALSE){
			
			// Data output
			$this->print_wrapper("order_status/index");
		}else{
			// Get Mtb_order_status
			$mtb_order_status	= $this->Mtb_order_status->get_Mtb_order_status_by_id($this->input->post('mtb_order_status'));
			
			if(!$mtb_order_status){
				$this->disp_data['error'] = array('mtb_order_status' => "ステータスの値が不正です。");
				
				// Upload Error
				$this->print_wrapper("order_status/index");
			}
			
			if($this->input->post('confirm_flag') != 1){
				$upload_conf	= array();
				$upload_conf['upload_path']		= '/tmp/babypeenats.net';
				$upload_conf['allowed_types']	= 'csv';
				$upload_conf['encrypt_name']	= true;
				
				if(!file_exists($upload_conf['upload_path'])){
					// Make Directory
					mkdir($upload_conf['upload_path']);
				}
				
				// Delete Old File
				$this->_delete_old_file($upload_conf['upload_path']);
				$upload_conf['upload_path']	.= '/';
				$this->load->library('upload', $upload_conf);
				
				// File Upload
				if (!$this->upload->do_upload('upload_file')){
					$this->disp_data['errors'] = array('upload_file' => $this->upload->display_errors());
					var_dump($this->upload->display_errors());
					// Upload Error
					$this->print_wrapper("order_status/index");
					//
					return NULL;
				}
				// Upload Success
				$upload_data	= $this->upload->data();
				$order_no		= array();
				if (($fp = fopen("{$upload_conf['upload_path']}{$upload_data['file_name']}", "r")) !== FALSE) {
					while ($line = fgets($fp)){
						if($line){
							$line_tmp	= array();
							$line_tmp	= explode(",", $line);
							$order_no[]	= $line_tmp[0];
						}
					}
					fclose($fp);
					
					if(count($order_no)){
						$this->disp_data['confirm_flag']			= 1;
						$this->disp_data['order_no']				= implode('_', $order_no);
						$this->disp_data['mtb_order_status']		= $this->input->post('mtb_order_status');
						$this->disp_data['mtb_order_status_name']	= $mtb_order_status[0]['name'];
						//
						$this->print_wrapper("order_status/status_upload");
						return NULL;
					}else{
						$this->disp_data['errors'] = array('upload_file' => "ファイルが間違っているか、対象データが１件も存在しません。");
					}
				}else{
					$this->disp_data['errors'] = array('upload_file' => "アップロードに失敗しました。");
				}
				
				//
				$this->print_wrapper("order_status/index");
			}elseif($this->input->post('confirm_flag') == 2){
				//
				redirect( site_url("order_status") );
			}else{
				// Update Dtb_order
				$order_no	= explode('_', $this->input->post('order_no'));
				$update_count	= 0;
				
				$this->db->trans_start();
				foreach($order_no as $key => $val){
					$update_data	= array();
					$update_data['status']	= $this->input->post('mtb_order_status');
					
					$this->Dtb_order->update_Dtb_order($val, $update_data);
					$update_count++;
				}
				$this->db->trans_complete();
				
				$this->disp_data['confirm_flag']			= 2;
				$this->disp_data['count']					= $update_count;
				//
				$this->print_wrapper("order_status/status_upload");
			}
		}
		
		//
		return NULL;
	}
	
	/*************************************************************
	* Delete Old Upload File
	* 
	**************************************************************/
	private function _delete_old_file($argDeletePath){
		
		$delete_handle	= opendir($argDeletePath);
		while($delete_files[]	= readdir($delete_handle));
		closedir($delete_handle);
		
		$delete_time = time() - 24*60*60;
		for($i=0; $delete_files[$i]; $i++){
			if($delete_files[$i] == '.' || $delete_files[$i] == '..') continue;
			$create_time = filectime($argDeletePath.'/'.$delete_files[$i]);
			if($create_time < $delete_time){
				unlink($argDeletePath.'/'.$delete_files[$i]);
			}
		}
		//
		return 0;
	}
	
	/*************************************************************
	* Set Vatidation Circle
	* 
	**************************************************************/
	private function _set_Validation(){
		$this->form_validation->set_rules('mtb_order_status', '更新ステータス', 'trim|required|is_natural_no_zero|xss_clean');
	}
}
?>
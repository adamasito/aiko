<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order_csv_controller extends MY_Controller {
	
	protected $csv_tile	= array();
	protected $csv_title	= array();
	
	protected $csv_title_order	= array();
	protected $csv_title_item	= array();
			
	function __construct(){
		parent::__construct();
		
		$this->disp_data['page_title']	= '注文CSV';
/*
		$this->csv_tile[]	= array('order_id', '注文番号');
		$this->csv_tile[]	= array('customer_id', '会員ID');
		$this->csv_tile[]	= array('message', '要望等');
		$this->csv_tile[]	= array('order_name01', 'お名前(姓)');
		$this->csv_tile[]	= array('order_name02', 'お名前(名)');
		$this->csv_tile[]	= array('order_kana01', 'お名前(フリガナ・姓)');
		$this->csv_tile[]	= array('order_kana02', 'お名前(フリガナ名)');
		$this->csv_tile[]	= array('order_email', 'メールアドレス');
		$this->csv_tile[]	= array('order_tel01', '電話番号1');
		$this->csv_tile[]	= array('order_tel02', '電話番号2');
		$this->csv_tile[]	= array('order_tel03', '電話番号3');
		$this->csv_tile[]	= array('order_fax01', 'FAX1');
		$this->csv_tile[]	= array('order_fax02', 'FAX2');
		$this->csv_tile[]	= array('order_fax03', 'FAX3');
		$this->csv_tile[]	= array('order_zip01', '郵便番号1');
		$this->csv_tile[]	= array('order_zip02', '郵便番号2');
		$this->csv_tile[]	= array('p1_name', '都道府県');
		$this->csv_tile[]	= array('order_addr01', '住所1');
		$this->csv_tile[]	= array('order_addr02', '住所2');
		$this->csv_tile[]	= array('order_sex', '性別');
		$this->csv_tile[]	= array('order_birth', '生年月日');
		$this->csv_tile[]	= array('j_name', '職種');
		$this->csv_tile[]	= array('subtotal', '小計');
		$this->csv_tile[]	= array('discount', '値引き');
		$this->csv_tile[]	= array('deliv_fee', '送料');
		$this->csv_tile[]	= array('charge', '手数料');
		$this->csv_tile[]	= array('use_point', '使用ポイント');
		$this->csv_tile[]	= array('add_point', '加算ポイント');
		$this->csv_tile[]	= array('tax', '使用ポイント');
		$this->csv_tile[]	= array('use_point', '税金');
		$this->csv_tile[]	= array('total', '合計');
		$this->csv_tile[]	= array('payment_total', 'お支払い合計');
		$this->csv_tile[]	= array('deliv_id', '配送業者ID');
		$this->csv_tile[]	= array('payment_method', '支払い方法');
		$this->csv_tile[]	= array('note', 'SHOPメモ');
		$this->csv_tile[]	= array('status', '対応状況');
		$this->csv_tile[]	= array('create_date', '注文日時');
		$this->csv_tile[]	= array('update_date', '更新日時');
		$this->csv_tile[]	= array('commit_date', '発送完了日時');
		$this->csv_tile[]	= array('device_type_id', '端末種別ID');
		$this->csv_tile[]	= array('unit', '配送先数');
		$this->csv_tile[]	= array('shipping_id', '配送情報ID');
		$this->csv_tile[]	= array('order_detail_id', '注文番号詳細');
		$this->csv_tile[]	= array('product_id', '商品ID');
		$this->csv_tile[]	= array('product_class_id', '商品規格ID');
		$this->csv_tile[]	= array('product_name', '商品名');
		$this->csv_tile[]	= array('product_code', '商品コード');
		$this->csv_tile[]	= array('classcategory_name1', '商品規格名1');
		$this->csv_tile[]	= array('classcategory_name2', '商品規格名2');
		$this->csv_tile[]	= array('price', '単価');
		$this->csv_tile[]	= array('quantity', '個数');
		$this->csv_tile[]	= array('shipping_name01', '配送先お名前(姓)');
		$this->csv_tile[]	= array('shipping_name02', '配送先お名前(名)');
		$this->csv_tile[]	= array('shipping_kana01', '配送先お名前(フリガナ・姓)');
		$this->csv_tile[]	= array('shipping_kana02', '配送先お名前(フリガナ名)');
		$this->csv_tile[]	= array('shipping_tel01', '配送先電話番号1');
		$this->csv_tile[]	= array('shipping_tel02', '配送先電話番号2');
		$this->csv_tile[]	= array('shipping_tel03', '配送先電話番号3');
		$this->csv_tile[]	= array('shipping_fax01', '配送先FAX1');
		$this->csv_tile[]	= array('shipping_fax02', '配送先FAX2');
		$this->csv_tile[]	= array('shipping_fax03', '配送先FAX3');
		$this->csv_tile[]	= array('shipping_zip01', '配送先郵便番号1');
		$this->csv_tile[]	= array('shipping_zip02', '配送先郵便番号2');
		$this->csv_tile[]	= array('p2_name', '配送先都道府県');
		$this->csv_tile[]	= array('shipping_addr01', '配送先住所1');
		$this->csv_tile[]	= array('shipping_addr02', '配送先住所2');
		$this->csv_tile[]	= array('shipping_time', '配送時間');
		$this->csv_tile[]	= array('shipping_date', '配送予定日');
		$this->csv_tile[]	= array('shipping_num', '配送伝票番号');
*/
		// csv_title_orderの設定
		$this->csv_title_order[]	= array('order_id', '注文番号');
		$this->csv_title_order[]	= array('invoice_num', '請求番号（SMBC）／決済番号（J-Payment）');
		$this->csv_title_order[]	= array('create_date', '注文日時');
		$this->csv_title_order[]	= array('payment_method', '支払い方法');
		$this->csv_title_order[]	= array('payment_date', '入金日時（可能であれば）');
		$this->csv_title_order[]	= array('subtotal', '小計');
		$this->csv_title_order[]	= array('deliv_fee', '送料');
		$this->csv_title_order[]	= array('payment_total', 'お支払い合計');
		$this->csv_title_order[]	= array('order_name', 'お名前');
		$this->csv_title_order[]	= array('order_kana', 'お名前(フリガナ)');
		$this->csv_title_order[]	= array('order_zip', '郵便番号');
		$this->csv_title_order[]	= array('order_addr', '住所1');
		$this->csv_title_order[]	= array('order_addr02', '住所2');
		$this->csv_title_order[]	= array('order_tel', '電話番号');
		$this->csv_title_order[]	= array('order_email', 'メールアドレス');
		$this->csv_title_order[]	= array('note', 'SHOPメモ');
		
		// csv_title_itemの設定
		$this->csv_title_item[]	= array('product_code', '商品コード');
		$this->csv_title_item[]	= array('product_classcategory_name', '商品名');
		$this->csv_title_item[]	= array('price', '単価');
		$this->csv_title_item[]	= array('quantity', '個数');
		
		// Load model
		$this->load->model('Dtb_order', '', true);
	}
	
	/*************************************************************
	* Update Dtb_order status
	* order_csv/index
	* 
	**************************************************************/
	function index(){
		$this->disp_data['page_title']	= "注文CSVダウンロード";
		
		//set payment data
		$payment_type	= $this->Dtb_order->get_Dtb_payment();
		$this->disp_data['payment_type']	= $payment_type;
		// Data output
		$this->print_wrapper("order_csv/index");
	}
	
	/*************************************************************
	* Update Dtb_order status
	* order_shogo/index
	* 
	**************************************************************/
	function shogo_index(){
		$this->disp_data['page_title']	= "決済データ照合";
		// Data output
		$this->print_wrapper("order_shogo/index");
	}
	/*************************************************************
	* Update  Dtb_order status
	* order_status/status_upload
	* 
	**************************************************************/
	function csv_data_download(){
		$this->load->helper('download');
		$this->load->dbutil();
		
		$search_info	= array();
		
			$search_info['stt_create_date']	= $this->input->post('stt_create_date');
			$search_info['end_create_date']	= $this->input->post('end_create_date');
			$search_info['payment_method']	= $this->input->post('payment_method');
			$search_info['order_name01']	= $this->input->post('order_name01');
			$search_info['order_name02']	= $this->input->post('order_name02');
			$search_info['stt_order_id']	= $this->input->post('stt_order_id');
			$search_info['end_order_id']	= $this->input->post('end_order_id');
		
		$time	= date('YmdGhis');
		$name	= "order_csv_{$time}.csv";
		
		// get Mtb_order_status
		$csv_data	= array();
		$csv_data	= $this->Dtb_order->get_Dtb_order_csv2($search_info);
		
		$csv		= array();
		$csv_tmp	= array();
		$title		= array();
		$max_colmun	= 0;
		
		// データ作成
		foreach($csv_data as $key => $val){
			$row_tmp	= array();
			if(!array_key_exists($val['sort_id'], $csv_tmp)){
				// 注文
				foreach($this->csv_title_order as $key2 => $val2){
					$row_tmp[]	= $val[$val2[0]];
				}
				
				// 商品追加
				foreach($this->csv_title_item as $key3 => $val3){
					$row_tmp[]	= $val[$val3[0]];
				}
			}else{
				$row_tmp	= $csv_tmp[$val['sort_id']];
				// 商品追加
				foreach($this->csv_title_item as $key3 => $val3){
					$row_tmp[]	= $val[$val3[0]];
				}
				if(count($row_tmp) > $max_colmun){
					$max_colmun	= count($row_tmp);
				}
			}
			//
			$csv_tmp[(int)$val['sort_id']]	= $row_tmp;
		}
		
		//タイトル作成
		foreach($this->csv_title_order as $key2 => $val2){
			$title[]	= $val2[1];
		}
		for($i=1; $i<=(($max_colmun-count($this->csv_title_order)) / (count($this->csv_title_item))) ;$i++){
			foreach($this->csv_title_item as $key5 => $val5){
				$title[]	= $val5[1].$i;
			}
		}
		//
		$csv_tmp[0]	= $title;
		
		//
		ksort($csv_tmp);
		
		foreach($csv_tmp as $key4 => $val4){
			$csv[]	= implode(",", $val4);
		}
		
		force_download( $name , mb_convert_encoding(implode("\n", $csv),'Shift-JIS','UTF-8'));
		
		//
		return NULL;
	}
	
	/*************************************************************
	* Update  Dtb_order status
	* order_status/status_upload
	* 
	**************************************************************/
	function shogo_csv_download(){
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
//			var_dump($this->upload->display_errors());
			// Upload Error
			$this->print_wrapper("order_shogo/index");
			//
			return NULL;
		}
		// Upload Success
		$upload_data	= $this->upload->data();
		$order_no		= array();
		if (($fp = fopen("{$upload_conf['upload_path']}{$upload_data['file_name']}", "r")) !== FALSE) {
			if($this->input->post('file_type')	== 0){
				while ($line = fgets($fp)){
					if($line){
						$line_tmp	= array();
						$line_tmp	= explode(",", $line);
						if(mb_convert_encoding($line_tmp[1],'UTF-8','Shift-JIS')	== "仮実同時" && mb_convert_encoding($line_tmp[2],'UTF-8','Shift-JIS')	== "決済成功"){
							$order_no[]	= $line_tmp[3];
						}
					}
				}
			}else{
				while ($line = fgets($fp)){
					if($line){
						$line_tmp	= array();
						$line_tmp	= explode(",", $line);
						$order_no[]	= (int)substr($line_tmp[9],3);
					}
				}
			}
			
			fclose($fp);
			if(count($order_no)){
				$this->load->helper('download');
				$this->load->dbutil();
				$search_info	= array();
//				$search_info['stt_create_date']	= $this->input->post('stt_create_date');
//				$search_info['end_create_date']	= $this->input->post('end_create_date');
//				$search_info['stt_order_id']	= $this->input->post('stt_order_id');
//				$search_info['end_order_id']	= $this->input->post('end_order_id');
				$search_info['order_id_in']		= $order_no;
				//
				$time	= date('YmdGhis');
				$name	= "shogo_csv_{$time}.csv";
				
				// get Mtb_order_status
				$csv_data	= array();
				$csv_data	= $this->Dtb_order->get_Dtb_order_csv2($search_info);
				$csv		= array();
				$csv_tmp	= array();
				$title		= array();
				$max_colmun	= 0;

				if($csv_data){
					// データ作成
					foreach($csv_data as $key => $val){
						$row_tmp	= array();
						if(!array_key_exists($val['sort_id'], $csv_tmp)){
							// 注文
							foreach($this->csv_title_order as $key2 => $val2){
								$row_tmp[]	= $val[$val2[0]];
							}
							// 商品追加
							foreach($this->csv_title_item as $key3 => $val3){
								$row_tmp[]	= $val[$val3[0]];
							}
						}else{
							$row_tmp	= $csv_tmp[$val['sort_id']];
							// 商品追加
							foreach($this->csv_title_item as $key3 => $val3){
								$row_tmp[]	= $val[$val3[0]];
							}
							if(count($row_tmp) > $max_colmun){
								$max_colmun	= count($row_tmp);
							}
						}
						//
						$csv_tmp[(int)$val['sort_id']]	= $row_tmp;
					}
					//
					ksort($csv_tmp);

					foreach($csv_tmp as $key4 => $val4){
						$csv[]	= implode(",", $val4);
					}

					force_download( $name , mb_convert_encoding(implode("\n", $csv),'Shift-JIS','UTF-8'));
					//
					return NULL;
					
				}else{
						$this->disp_data['errors'] = array('no_data' => "対象データが１件も存在しません。");
				}
				
			}else{
				$this->disp_data['errors'] = array('upload_file' => "対象データが１件も存在しません。");
			}
		}else{
			$this->disp_data['errors'] = array('upload_file' => "アップロードに失敗しました。");
		}
		
		//
		$this->print_wrapper("order_shogo/index");
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
}
?>
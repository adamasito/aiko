<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dtb_order extends CI_Model{
	// Set Tabke Nasme
	protected $table_name 		= 'dtb_order';
	protected $select_csv		= '';
	function __construct(){
		parent::__construct();
		$ci =& get_instance();
		
/*
		$select_csv = <<< _SELECT_
 o.order_id as "注文番号"
,o.customer_id as "会員ID"
,o.message as "要望等"
,o.order_name01 as "お名前(姓)"
,o.order_name02 as "お名前(名)"
,o.order_kana01 as "お名前(フリガナ・姓)"
,o.order_kana02 as "お名前(フリガナ名)"
,o.order_email as "メールアドレス"
,o.order_tel01 as "電話番号1"
,o.order_tel02 as "電話番号2"
,o.order_tel03 as "電話番号3"
,o.order_fax01 as "FAX1"
,o.order_fax02 as "FAX2"
,o.order_fax03 as "FAX3"
,o.order_zip01 as "郵便番号1"
,o.order_zip02 as "郵便番号2"
,p1.name as "都道府県"
,o.order_addr01 as "住所1"
,o.order_addr02 as "住所2"
,o.order_sex as "性別"
,o.order_birth as "生年月日"
,j.name as "職種"
,o.subtotal as "小計"
,o.discount as "値引き"
,o.deliv_fee as "送料"
,o.charge as "手数料"
,o.use_point as "使用ポイント"
,o.add_point as "加算ポイント"
,o.tax as "税金"
,o.total as "合計"
,o.payment_total as "お支払い合計"
,o.deliv_id as "配送業者ID"
,o.payment_method as "支払い方法"
,REPLACE(REPLACE(REPLACE(o.note, "\r\n", " "),"\n", " "),"/n", " ") as "SHOPメモ"
,o.status as "	対応状況"
,o.create_date as "注文日時"
,o.update_date as "更新日時"
,o.commit_date as "発送完了日時"
,o.device_type_id as "端末種別ID"
,'配送先数' as "配送先数"
,s.shipping_id as "配送情報ID"
,d.order_detail_id as "注文番号詳細"
,d.product_id as "商品ID"
,d.product_class_id as "商品規格ID"
,d.product_name as "商品名"
,d.product_code as "商品コード"
,d.classcategory_name1 as "商品規格名1"
,d.classcategory_name2 as "商品規格名2"
,d.price as "単価"
,d.quantity as "個数"
,s.shipping_name01 as "配送先お名前(姓)"
,s.shipping_name02 as "配送先お名前(名)"
,s.shipping_kana01 as "配送先お名前(フリガナ・姓)"
,s.shipping_kana02 as "配送先お名前(フリガナ名)"
,s.shipping_tel01 as "配送先電話番号1"
,s.shipping_tel02 as "配送先電話番号2"
,s.shipping_tel03 as "配送先電話番号3"
,s.shipping_fax01 as "配送先FAX1"
,s.shipping_fax02 as "配送先FAX2"
,s.shipping_fax03 as "配送先FAX3"
,s.shipping_zip01 as "配送先郵便番号1"
,s.shipping_zip02 as "配送先郵便番号2"
,p2.name as "配送先都道府県"
,s.shipping_addr01 as "配送先住所1"
,s.shipping_addr02 as "配送先住所2"
,s.shipping_time as "配送時間"
,s.shipping_date as "配送予定日"
,s.shipping_num as "配送伝票番号"
_SELECT_;
*/
		
/*		$this->select_csv = <<< _SELECT_
 concat('="',o.order_id,'"') as "注文番号"
,concat('="',o.customer_id,'"') as "会員ID"
,concat('="',o.message,'"') as "要望等"
,concat('="',o.order_name01,'"') as "お名前(姓)"
,concat('="',o.order_name02,'"') as "お名前(名)"
,concat('="',o.order_kana01,'"') as "お名前(フリガナ・姓)"
,concat('="',o.order_kana02,'"') as "お名前(フリガナ名)"
,concat('="',o.order_email,'"') as "メールアドレス"
,concat('="',o.order_tel01,'"') as "電話番号1"
,concat('="',o.order_tel02,'"') as "電話番号2"
,concat('="',o.order_tel03,'"') as "電話番号3"
,concat('="',o.order_fax01,'"') as "FAX1"
,concat('="',o.order_fax02,'"') as "FAX2"
,concat('="',o.order_fax03,'"') as "FAX3"
,concat('="',o.order_zip01,'"') as "郵便番号1"
,concat('="',o.order_zip02,'"') as "郵便番号2"
,concat('="',p1.name,'"') as "都道府県"
,concat('="',o.order_addr01,'"') as "住所1"
,concat('="',o.order_addr02,'"') as "住所2"
,concat('="',o.order_sex,'"') as "性別"
,concat('="',o.order_birth,'"') as "生年月日"
,concat('="',j.name,'"') as "職種"
,concat('="',o.subtotal,'"') as "小計"
,concat('="',o.discount,'"') as "値引き"
,concat('="',o.deliv_fee,'"') as "送料"
,concat('="',o.charge,'"') as "手数料"
,concat('="',o.use_point,'"') as "使用ポイント"
,concat('="',o.add_point,'"') as "加算ポイント"
,concat('="',o.tax,'"') as "税金"
,concat('="',o.total,'"') as "合計"
,concat('="',o.payment_total,'"') as "お支払い合計"
,concat('="',o.deliv_id,'"') as "配送業者ID"
,concat('="',o.payment_method,'"') as "支払い方法"
,concat('="',REPLACE(REPLACE(REPLACE(o.note, "\r\n", " "),"\n", " "),"/n", " ") ,'"') as "SHOPメモ"
,concat('="',o.status,'"') as "	対応状況"
,concat('="',o.create_date,'"') as "注文日時"
,concat('="',o.update_date,'"') as "更新日時"
,concat('="',o.commit_date,'"') as "発送完了日時"
,concat('="',o.device_type_id,'"') as "端末種別ID"
,concat('="','配送先数','"') as "配送先数"
,concat('="',s.shipping_id,'"') as "配送情報ID"
,concat('="',d.order_detail_id,'"') as "注文番号詳細"
,concat('="',d.product_id,'"') as "商品ID"
,concat('="',d.product_class_id,'"') as "商品規格ID"
,concat('="',d.product_name,'"') as "商品名"
,concat('="',d.product_code,'"') as "商品コード"
,concat('="',d.classcategory_name1,'"') as "商品規格名1"
,concat('="',d.classcategory_name2,'"') as "商品規格名2"
,concat('="',d.price,'"') as "単価"
,concat('="',d.quantity,'"') as "個数"
,concat('="',s.shipping_name01,'"') as "配送先お名前(姓)"
,concat('="',s.shipping_name02,'"') as "配送先お名前(名)"
,concat('="',s.shipping_kana01,'"') as "配送先お名前(フリガナ・姓)"
,concat('="',s.shipping_kana02,'"') as "配送先お名前(フリガナ名)"
,concat('="',s.shipping_tel01,'"') as "配送先電話番号1"
,concat('="',s.shipping_tel02,'"') as "配送先電話番号2"
,concat('="',s.shipping_tel03,'"') as "配送先電話番号3"
,concat('="',s.shipping_fax01,'"') as "配送先FAX1"
,concat('="',s.shipping_fax02,'"') as "配送先FAX2"
,concat('="',s.shipping_fax03,'"') as "配送先FAX3"
,concat('="',s.shipping_zip01,'"') as "配送先郵便番号1"
,concat('="',s.shipping_zip02,'"') as "配送先郵便番号2"
,concat('="',p2.name,'"') as "配送先都道府県"
,concat('="',s.shipping_addr01,'"') as "配送先住所1"
,concat('="',s.shipping_addr02,'"') as "配送先住所2"
,concat('="',s.shipping_time,'"') as "配送時間"
,concat('="',s.shipping_date,'"') as "配送予定日"
,concat('="',s.shipping_num,'"') as "配送伝票番号"
_SELECT_;*/
				$this->select_csv = <<< _SELECT_
 concat('="',o.order_id,'"') as "order_id"
,concat('="',o.customer_id,'"') as "customer_id"
,concat('="',o.message,'"') as "message"
,concat('="',o.order_name01,'"') as "order_name01"
,concat('="',o.order_name02,'"') as "order_name02"
,concat('="',ifnull(o.order_name01,""),"    ",ifnull(o.order_name02,""),'"') as "order_name"
,concat('="',o.order_kana01,'"') as "order_kana01"
,concat('="',o.order_kana02,'"') as "order_kana02"
,concat('="',ifnull(o.order_kana01,""),"    ",ifnull(o.order_kana02,""),'"') as "order_kana"
,concat('="',o.order_email,'"') as "order_email"
,concat('="',o.order_tel01,'"') as "order_tel01"
,concat('="',o.order_tel02,'"') as "order_tel02"
,concat('="',o.order_tel03,'"') as "order_tel03"
,concat('="',ifnull(o.order_tel01,""),"    ",ifnull(o.order_tel02,""),"    ",ifnull(o.order_tel03,""),'"') as "order_tel"
,concat('="',o.order_fax01,'"') as "order_fax01"
,concat('="',o.order_fax02,'"') as "order_fax02"
,concat('="',o.order_fax03,'"') as "order_fax03"
,concat('="',o.order_zip01,'"') as "order_zip01"
,concat('="',o.order_zip02,'"') as "order_zip02"
,concat('="',ifnull(o.order_zip01,""),"    ",ifnull(o.order_zip02,""),'"') as "order_zip"
,concat('="',p1.name,'"') as "p1_name"
,concat('="',o.order_addr01,'"') as "order_addr01"
,concat('="',o.order_addr02,'"') as "order_addr02"
,concat('="',ifnull(p1.name,""),"    ",ifnull(o.order_addr01,""),'"') as "order_addr"
,concat('="',o.order_sex,'"') as "order_sex"
,concat('="',o.order_birth,'"') as "order_birth"
,concat('="',j.name,'"') as "j_name"
,concat('="',o.subtotal,'"') as "subtotal"
,concat('="',o.discount,'"') as "discount"
,concat('="',o.deliv_fee,'"') as "deliv_fee"
,concat('="',o.charge,'"') as "charge"
,concat('="',o.use_point,'"') as "use_point"
,concat('="',o.add_point,'"') as "add_point"
,concat('="',o.tax,'"') as "tax"
,concat('="',o.total,'"') as "total"
,concat('="',o.payment_total,'"') as "payment_total"
,concat('="',o.deliv_id,'"') as "deliv_id"
,concat('="',o.payment_method,'"') as "payment_method"
,concat('="',REPLACE(REPLACE(REPLACE(o.note, "\r\n", " "),"\n", " "),"/n", " ") ,'"') as "note"
,concat('="',o.status,'"') as "status"
,o.create_date as "create_date"	
,concat('="',o.create_date,'"') as "create_date"
,concat('="',o.update_date,'"') as "update_date"
,concat('="',o.commit_date,'"') as "commit_date"
,concat('="',o.device_type_id,'"') as "device_type_id"
,concat('="','','"') as "unit"
,concat('="',s.shipping_id,'"') as "shipping_id"
,concat('="',d.order_detail_id,'"') as "order_detail_id"
,concat('="',d.product_id,'"') as "product_id"
,concat('="',d.product_class_id,'"') as "product_class_id"
,concat('="',d.product_name,'"&    &"',d.classcategory_name1,'"') as "product_name"
,concat('="',d.product_code,'"') as "product_code"
,concat('&"    "&"',d.classcategory_name1,'"') as "classcategory_name1"
,concat('="',d.classcategory_name2,'"') as "classcategory_name2"
,concat('="',ifnull(d.product_name,""),"    ",ifnull(d.classcategory_name1,""),'"') as "product_classcategory_name"
,concat('="',d.price,'"') as "price"
,concat('="',d.quantity,'"') as "quantity"
,concat('="',s.shipping_name01,'"') as "shipping_name01"
,concat('="',s.shipping_name02,'"') as "shipping_name02"
,concat('="',s.shipping_kana01,'"') as "shipping_kana01"
,concat('="',s.shipping_kana02,'"') as "shipping_kana02"
,concat('="',s.shipping_tel01,'"') as "shipping_tel01"
,concat('="',s.shipping_tel02,'"') as "shipping_tel02"
,concat('="',s.shipping_tel03,'"') as "shipping_tel03"
,concat('="',s.shipping_fax01,'"') as "shipping_fax01"
,concat('="',s.shipping_fax02,'"') as "shipping_fax02"
,concat('="',s.shipping_fax03,'"') as "shipping_fax03"
,concat('="',s.shipping_zip01,'"') as "shipping_zip01"
,concat('="',s.shipping_zip02,'"') as "shipping_zip02"
,concat('="',p2.name,'"') as "p2_name"
,concat('="',s.shipping_addr01,'"') as "shipping_addr01"
,concat('="',s.shipping_addr02,'"') as "shipping_addr02"
,concat('="',s.shipping_time,'"') as "shipping_time"
,concat('="',s.shipping_date,'"') as "shipping_date"
,concat('="',s.shipping_num,'"') as "shipping_num"
, '=""' as invoice_num
, '=""' as payment_date
,o.order_id as "sort_id"
_SELECT_;
	}
	
	/*************************************************************
	* 
	* get Csv record
	* 
	**************************************************************/
	function get_Dtb_order_csv($offset = 0, $limit = 1000){
		
		$sql	= <<< _SQL_
select
{$this->select_csv}
from
  dtb_order_detail as d
  inner join dtb_order as o
  on(o.order_id = d.order_id)
  inner join dtb_shipping as s
  on(s.order_id = d.order_id)
  left join mtb_pref as p1
  on(p1.id = o.order_pref)
  left join mtb_pref as p2
  on(p2.id = s.shipping_pref)
  left join mtb_job as j
  on(j.id=o.order_job)
  order by o.order_id,d.order_detail_id
limit {$offset},{$limit}
_SQL_;
		$query	= $this->db->query($sql);
		
		return $this->db->get()->result_array();
		//
		//
		//return $this->dbutil->csv_from_result($query, ",", "\n");
	}
	/*************************************************************
	* 
	* get Payment Method
	* 
	**************************************************************/
	function get_Dtb_payment(){
		// select
		$this->db->select('payment_id,payment_method');
		// from
		$this->db->from('dtb_payment');
		// make where
		$this->db->where('status',1);
		$this->db->where('del_flg',0);
		// order
		$this->db->order_by('payment_id');
		
		
		return $this->db->get()->result_array();
		
	}
	/*************************************************************
	* 
	* get Csv record
	* 
	**************************************************************/
	function get_Dtb_order_csv2($search_info, $offset=0){
		// select
		$this->db->select($this->select_csv, FALSE);
		
		// make where
		foreach ($search_info as $key => $val){
			if($val){
				switch ($key) {
					case 'stt_create_date':
						$this->db->where("DATE_FORMAT(o.create_date,'%Y-%m-%d') >=", $search_info['stt_create_date']);
						break;	
					case 'end_create_date':
						$this->db->where("DATE_FORMAT(o.create_date,'%Y-%m-%d') <=", $search_info['end_create_date']);
						break;	
					case 'payment_method':
						$this->db->where('o.payment_id', $search_info['payment_method']);
						break;	
					case 'order_name01':
						$this->db->like('o.order_name01', $search_info['order_name01'], FALSE);
						break;	
					case 'order_name02':
						$this->db->like('o.order_name02', $search_info['order_name02'], FALSE);
						break;	
					case 'stt_order_id':
						$this->db->where('o.order_id >=', $search_info['stt_order_id'], FALSE);
						break;	
					case 'end_order_id':
						$this->db->where('o.order_id <=', $search_info['end_order_id'], FALSE);
						break;	
					case 'order_id_in':
						$this->db->where_in('o.order_id', $search_info['order_id_in'], FALSE);
						break;	
//					default:
//						$this->db->where($this->table_name.".".$key,$val);
//						break;
				}
			}
		}
//		$where	= "";
//		if($search_info['stt_create_date']){
//			$this->db->where("DATE_FORMAT(o.create_date,'%Y-%m-%d') >=", $search_info['stt_create_date']);
//		}
//		if($search_info['end_create_date']){
//			$this->db->where("DATE_FORMAT(o.create_date,'%Y-%m-%d') <=", $search_info['end_create_date']);
//		}
//		if($search_info['payment_method']){
//			$this->db->where('o.payment_id', $search_info['payment_method']);
//		}
//		if($search_info['order_name01']){
//			$this->db->like('o.order_name01', $search_info['order_name01'], FALSE);
//		}
//		if($search_info['order_name02']){
//			$this->db->like('o.order_name02', $search_info['order_name02'], FALSE);
//		}
//		if($search_info['stt_order_id']){
//			$this->db->where('o.order_id >=', $search_info['stt_order_id'], FALSE);
//		}
//		if($search_info['end_order_id']){
//			$this->db->where('o.order_id <=', $search_info['end_order_id'], FALSE);
//		}
//		if($search_info['order_id_in']){
//			$this->db->where_in('o.order_id', $search_info['order_id_in'], FALSE);
//		}
		
		// from
		$this->db->from('dtb_order_detail as d');
		
		// join
		$this->db->join('dtb_order as o', 'o.order_id = d.order_id', 'inner');
		$this->db->join('dtb_shipping as s', 's.order_id = d.order_id', 'left');
		$this->db->join('mtb_pref as p1', 'p1.id = o.order_pref', 'left');
		$this->db->join('mtb_pref as p2', 'p2.id = o.order_pref', 'left');
		$this->db->join('mtb_job as j', 'j.id = o.order_job', 'left');
		
		// order
		$this->db->order_by('o.order_id');
		//$this->db->get()->result_array();
		//echo $this->db->last_query();
		return $this->db->get()->result_array();
		//
		//return $this->dbutil->csv_from_result($this->db->get(), ",", "\n");
	}
	/*************************************************************
	* 
	* Update Dtb_order record
	* 
	**************************************************************/
	function update_Dtb_order($id, $data){
		$this->db->where('order_id', $id);
		//
		return $this->db->update($this->table_name, $data);
	}
}

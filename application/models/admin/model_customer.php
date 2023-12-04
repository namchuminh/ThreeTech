<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_customer extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllCustomer($start = 5){
		$sql = "SELECT * FROM khachhang LIMIT ".$start;
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function exportExcel(){
		$sql = "SELECT taiKhoan, matKhau, hoTen, soDienThoai, diaChi FROM khachhang";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function searchInfoCustomer($hoTen){
		$hoTen = "%".$hoTen."%";
		$sql = "SELECT * FROM `khachhang` WHERE hoTen LIKE '".$hoTen."' LIMIT 5";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function deleteInfoCustomer($khachHangId){
		$sql = "DELETE FROM `khachhang` WHERE khachHangId = ?";
		$result = $this->db->query($sql, array($khachHangId));
		return $result;
	}
}

/* End of file model_customer.php */
/* Location: ./application/models/model_customer.php */
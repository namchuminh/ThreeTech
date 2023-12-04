<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_login extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkUserLoginDB($taikhoan, $matkhau){
		$sql = "SELECT * FROM khachhang WHERE taiKhoan = ? AND matKhau = ?";
		$result = $this->db->query($sql,array($taikhoan, $matkhau));
		return $result->num_rows();
	}
	public function checkUserName($taikhoan){
		$sql = "SELECT * FROM khachhang WHERE taiKhoan = ?";
		$result = $this->db->query($sql,array($taikhoan));
		return $result->num_rows();
	}

	public function getInfo($taikhoan){
		$sql = "SELECT * FROM khachhang WHERE taiKhoan = ?";
		$result = $this->db->query($sql,array($taikhoan));
		return $result->result_array();
	}
}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */
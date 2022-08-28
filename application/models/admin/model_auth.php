<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_auth extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkLoginDB($taikhoan, $matkhau){
		$sql = "SELECT * FROM nhanvien WHERE taiKhoan = ? AND matKhau = ?";
		$result = $this->db->query($sql, array($taikhoan, $matkhau));
		return $result->num_rows();
	}
}

/* End of file model_auth.php */
/* Location: ./application/models/model_auth.php */
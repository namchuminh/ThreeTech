<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_addUser extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertUser($taikhoan, $matkhau, $hoten, $sodienthoai, $diachi)
	{
		// code...
		$sql = "INSERT INTO khachhang(taiKhoan, matKhau, hoTen, soDienThoai, diaChi) VALUES (?,?,?,?,?)";
		$result = $this->db->query($sql,array($taikhoan, $matkhau, $hoten, $sodienthoai, $diachi));
		return $result;
	}

}

/* End of file model_addUser.php */
/* Location: ./application/models/model_addUser.php */
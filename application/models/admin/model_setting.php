<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_setting extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getProfileAdmin($taikhoan){
		$sql = "SELECT * FROM nhanvien WHERE taiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function updateProfileAdmin($matKhau,  $hoTen, $soDienThoai, $email, $facebook,  $avatar, $taikhoan){
		$sql = "UPDATE `nhanvien` SET `matKhau`= ?,`hoTen`= ?,`soDienThoai`= ?,`email`= ?,`facebook`= ?,`avatar`= ? WHERE `taiKhoan`= ?";
		$result = $this->db->query($sql, array($matKhau, $hoTen, $soDienThoai, $email, $facebook,  $avatar, $taikhoan));
		return $result;
	}

}

/* End of file model_setting.php */
/* Location: ./application/models/model_setting.php */
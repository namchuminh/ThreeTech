<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_person extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllInfoPerson(){
		$sql = "SELECT * FROM nhanvien";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getInfoPersonById($nhanVienId){
		$sql = "SELECT * FROM nhanvien WHERE nhanVienId = ?";
		$result = $this->db->query($sql,array($nhanVienId));
		return $result->result_array();
	}

	public function getInfoPersonUsername($taikhoan){
		$sql = "SELECT * FROM nhanvien WHERE taiKhoan = ?";
		$result = $this->db->query($sql,array($taikhoan));
		return $result->result_array();
	}

	public function updateInfoPerson($matKhau, $hoTen, $soDienThoai, $email, $facebook, $avatar, $taikhoan){
		$sql = "UPDATE `nhanvien` SET `matKhau`= ?,`hoTen`= ?,`soDienThoai`= ?,`email`= ?,`facebook`= ?,`avatar`= ? WHERE `taiKhoan`= ?";
		$result = $this->db->query($sql, array($matKhau, $hoTen, $soDienThoai, $email, $facebook,  $avatar, $taikhoan));
		return $result;
	}
}

/* End of file model_person.php */
/* Location: ./application/models/model_person.php */
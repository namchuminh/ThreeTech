<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_person extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllInfoPerson($start = 5){
		$sql = "SELECT * FROM nhanvien ORDER BY chucVu LIMIT ".$start;
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

	public function updateInfoPerson($matKhau, $hoTen, $chucVu, $soDienThoai, $email, $facebook, $avatar, $taikhoan){
		$sql = "UPDATE `nhanvien` SET `matKhau`= ?,`hoTen`= ?, `chucVu`= ?, `soDienThoai`= ?,`email`= ?,`facebook`= ?,`avatar`= ? WHERE `taiKhoan`= ?";
		$result = $this->db->query($sql, array($matKhau, $hoTen, $chucVu, $soDienThoai, $email, $facebook,  $avatar, $taikhoan));
		return $result;
	}

	public function insertInfoPerson($taiKhoan, $matKhau, $hoTen, $chucVu, $soDienThoai, $email, $facebook, $avatar){
		$sql = "INSERT INTO `nhanvien`(`taiKhoan`, `matKhau`, `hoTen`, `chucVu`, `soDienThoai`, `email`, `facebook`, `avatar`) VALUES (?,?,?,?,?,?,?,?)";
		$result = $this->db->query($sql, array($taiKhoan, $matKhau, $hoTen, $chucVu, $soDienThoai, $email, $facebook, $avatar));
		return $result;
	}

	public function deleteInfoPerson($nhanVienId){
		$sql = "DELETE FROM `nhanvien` WHERE nhanVienId = ?";
		$result = $this->db->query($sql, array($nhanVienId));
		return $result;
	}

	public function searchInfoPerson($hoTen){
		$hoTen = "%".$hoTen."%";
		$sql = "SELECT * FROM `nhanvien` WHERE hoTen LIKE '".$hoTen."' ORDER BY chucVu LIMIT 5";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function mark($nhanVienId){
		$sql = "INSERT INTO `chamcong`(`nhanVienId`) VALUES (?)";
		$result = $this->db->query($sql, array($nhanVienId));
		return $result;
	}

	public function checkMark($nhanVienId){
		$sql = "SELECT * FROM `chamcong` WHERE nhanVienId = ? AND thoiGian >= CURDATE() - 1 AND thoiGian <= CURDATE() + 1";
		$result = $this->db->query($sql, array($nhanVienId));
		return $result->result_array();
	} 

	public function exportExcel(){
		$sql = "SELECT taiKhoan, matKhau, hoTen, chucVu, soDienThoai, email, facebook FROM nhanvien";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getPayWage(){
		$sql = "SELECT COUNT(chamcong.chamCongId) AS soLuongCong, nhanvien.hoTen, nhanvien.nhanVienId, nhanvien.soDienThoai FROM chamcong, nhanvien WHERE chamcong.nhanVienId = nhanvien.nhanVienId AND DAY(chamcong.thoiGian) >= 1 AND MONTH(chamcong.thoiGian) = MONTH(CURDATE()) AND YEAR(chamcong.thoiGian) = YEAR(CURDATE()) GROUP BY nhanvien.hoTen";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

/* End of file model_person.php */
/* Location: ./application/models/model_person.php */
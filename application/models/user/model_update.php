<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_update extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function updateProfile($hoTen, $soDienThoai, $diaChi, $khachHangId){
		$sql = "UPDATE khachhang SET hoTen =?, soDienThoai=?, diaChi=? WHERE khachHangId=?";
		$result = $this->db->query($sql,array($hoTen, $soDienThoai, $diaChi, $khachHangId));
		return $result;
	}
	public function updateProfileFull($hoTen, $soDienThoai, $diaChi, $matkhau, $khachHangId){
		$sql = "UPDATE khachhang SET hoTen =?, soDienThoai=?, diaChi=?, matKhau=? WHERE khachHangId=?";
		$result = $this->db->query($sql,array($hoTen, $soDienThoai, $diaChi, $matkhau, $khachHangId));
		return $result;
	}
}
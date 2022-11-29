<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_dathang extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function dathang($madonhang, $tenNguoiNhan, $soDienThoai, $diaChi){
		$sql = "INSERT INTO dathang(madonhang, tenNguoiNhan, soDienThoai, diaChi) VALUES (?,?,?,?)";
		$result = $this->db->query($sql,array($madonhang, $tenNguoiNhan, $soDienThoai, $diaChi));
		return $result;
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_hoadon extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function chitiethoadon($madonhang, $sanPhamId, $soLuong){
		$sql = "INSERT INTO chitiethoadon(madonhang, sanPhamId, soLuong) VALUES (?,?,?)";
		$result = $this->db->query($sql,array($madonhang, $sanPhamId, $soLuong));
		return $result;
	}
	
	public function updateProduct($soLuongBan, $sanPhamId){
		$sql = "UPDATE sanpham SET soLuong= soLuong - ? Where sanPhamId=?";
		$result = $this->db->query($sql,array($soLuongBan, $sanPhamId));
		return $result;
	}
}
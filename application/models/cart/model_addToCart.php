<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_addToCart extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addToCart($sanPhamId, $khachHangId){
		$sql = "INSERT INTO giohang(sanPhamId, khachHangId, soLuong) VALUES(?,?,?)";
		$result = $this->db->query($sql,array($sanPhamId, $khachHangId,1));
		return $result;
	}
	public function Cart($sanPhamId, $khachHangId){
		$sql = "SELECT * FROM giohang Where sanPhamId=? and khachHangId=?";
		$result = $this->db->query($sql,array($sanPhamId, $khachHangId));
		return $result->num_rows();
	}
	public function CartKH($khachHangId){
		$sql = "SELECT sanpham.*, giohang.soLuong as 'so luong ban' FROM giohang, sanpham WHERE giohang.sanPhamId = sanpham.sanPhamId AND khachHangId =?";
		$result = $this->db->query($sql,array($khachHangId));
		return $result->result_array();
	}
	public function updateCart($sanPhamId, $khachHangId){
		$sql = "UPDATE giohang set soLuong = soLuong + 1 Where sanPhamId=? and khachHangId=?";
		$result = $this->db->query($sql,array($sanPhamId, $khachHangId));
		return $result;
	}
	public function deleteProduct($sanPhamId, $khachHangId){
		$sql = "DELETE FROM giohang Where sanPhamId=? and khachHangId=?";
		$result = $this->db->query($sql,array($sanPhamId, $khachHangId));
		return $result;
	}
	public function deleteCart($khachHangId){
		$sql = "DELETE FROM giohang Where khachHangId=?";
		$result = $this->db->query($sql,array($khachHangId));
		return $result;
	}
	public function updateNumberProduct($soLuong, $sanPhamId, $khachHangId){
		$sql = "UPDATE giohang set soLuong = ? Where sanPhamId=? and khachHangId=?";
		$result = $this->db->query($sql,array($soLuong, $sanPhamId, $khachHangId));
		return $result;
	}
	public function cart_price($khachHangId){
		$sql = "SELECT SUM(giaBan * giohang.soLuong) as 'tongtien' from sanpham, giohang WHERE sanpham.sanPhamId = giohang.sanPhamId AND giohang.khachHangId=?";
		$result = $this->db->query($sql,array($khachHangId));
		return $result->result_array();
	}
	
}

/* End of file model_product.php */
/* Location: ./application/models/model_product.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_vnpay extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($khachHangId, $madonhang, $sotien, $noidung, $nganhang, $magiaodich){
		$sql = "INSERT INTO vnpay(khachHangId, madonhang, sotien, noidung, nganhang, magiaodich) VALUES (?,?,?,?,?,?)";
		$result = $this->db->query($sql,array($khachHangId, $madonhang, $sotien, $noidung, $nganhang, $magiaodich));
		return $result;
	}
	public function giaohang($khachHangId){
		$sql = "SELECT * from vnpay where khachHangId=?";
		$result = $this->db->query($sql, array($khachHangId));
		return $result->result_array();
	}
	public function chitiethoadon($madonhang){
		$sql = "SELECT sanpham.* , chitiethoadon.soLuong as 'soluongban', chitiethoadon.dagiaohang  as 'dagiaohang' FROM chitiethoadon, sanpham WHERE sanpham.sanPhamId = chitiethoadon.sanPhamId and madonhang = ?";
		$result = $this->db->query($sql, array($madonhang));
		return $result->result_array();
	}
	// public function chitietsanpham($madonhang){
	// 	$sql = "SELECT sanpham.* FROM chitiethoadon, sanpham WHERE sanpham.sanPhamId = chitiethoadon.sanPhamId and madonhang =?";
	// 	$result = $this->db->query($sql, array($madonhang));
	// 	return $result->result_array();
	// }
	// public function giaohang($khachHangId){
	// 	$sql = "SELECT sanpham.*, vnpay.* , vnpay.madonhang as 'madonhangvnpay', chitiethoadon.soLuong as 'soluongban' FROM chitiethoadon, sanpham, vnpay WHERE sanpham.sanPhamId = chitiethoadon.sanPhamId and vnpay.madonhang = chitiethoadon.madonhang AND vnpay.khachHangId = ?";
	// 	$result = $this->db->query($sql, array($khachHangId));
	// 	return $result->result_array();
	// }

}

/* End of file model_product.php */
/* Location: ./application/models/model_product.php */
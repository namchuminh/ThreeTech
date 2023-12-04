<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_product extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getDetailProduct($duongDan){
		$sql = 'SELECT * FROM sanpham WHERE duongDan = ?';
		$result = $this->db->query($sql, array($duongDan));
		return $result->result_array();
	}

	public function getCateByUrl($duongDan){
		$sql = "SELECT chuyenmuc.tenChuyenMuc, chuyenmuc.duongDanChuyenMuc FROM chuyenmuc, sanpham WHERE chuyenmuc.chuyenMucId = sanpham.chuyenMucId AND sanpham.duongDan = ?;";
		$result = $this->db->query($sql, array($duongDan));
		return $result->result_array();
	}

	public function getProductRelated($duongDan){
		$sql = 'SELECT * FROM sanpham WHERE duongDan != ?;';
		$result = $this->db->query($sql, array($duongDan));
		return $result->result_array();
	}
	public function getProductByeId($sanPhamId){
		$sql = "SELECT * FROM sanpham WHERE sanPhamId = ?;";
		$result = $this->db->query($sql, array($sanPhamId));
		return $result->result_array();
	}

	public function search($tenSanPham){
		$sql = "SELECT * FROM sanpham WHERE tenSanPham LIKE '%".$tenSanPham."%'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getProductTuongTu(){
		$sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 12";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function addToCart($sanPhamId, $khachHangId, $soLuong = 1){
		$sql = "INSERT INTO giohang (sanPhamId, khachHangId, soLuong) VALUES (?, ?, ?)";
		$result = $this->db->query($sql, array($sanPhamId, $khachHangId, $soLuong));
		return $result;
	}

	public function checkProductInCart($sanPhamId, $khachHangId){
		$sql = "SELECT * FROM giohang WHERE sanPhamId = ? AND khachHangId = ?";
		$result = $this->db->query($sql, array($sanPhamId, $khachHangId));
		return $result->result_array();
	} 

	public function updateProductInCart($sanPhamId, $khachHangId, $soLuong){
		$sql = "UPDATE giohang SET soLuong = ? WHERE sanPhamId = ? AND khachHangId = ?  ";
		$result = $this->db->query($sql, array($soLuong, $sanPhamId, $khachHangId));
		return $result;
	}
	public function getProductNoiBatMoi(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("noibatmoi"));
		return $result->result_array();
	}
	public function getProductAudioVideo(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("audiovideo"));
		return $result->result_array();
	}
	public function getProductMayTinhLaptop(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("Laptopcomputer"));
		return $result->result_array();
	}
	public function getProductTop20(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("Top20"));
		return $result->result_array();
	}
	public function getProductTrend(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("Trend"));
		return $result->result_array();
	}
}

/* End of file model_product.php */
/* Location: ./application/models/model_product.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_index extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getCustomerLogin($taikhoan)
	{
		// code...
		$sql = "SELECT * FROM khachhang WHERE taiKhoan=?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function getProductUuDai(){
		$sql = "SELECT * FROM sanpham WHERE loaiSanPham = ?";
		$result = $this->db->query($sql, array("Uudai"));
		return $result->result_array();
	}
	public function getProductGiamGia(){
		$sql = "SELECT sanpham.tenSanPham, sanpham.giaGoc, sanpham.giaBan, sanpham.anhChinh, sanpham.duongDan, chuyenmuc.tenChuyenMuc, chuyenmuc.duongDanChuyenMuc FROM `chuyenmuc`, `sanpham` WHERE chuyenmuc.chuyenMucId = sanpham.sanPhamId AND sanpham.loaiSanPham = 'Uudai'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function getProductLaptop(){
		$sql = "SELECT * FROM sanpham WHERE chuyenMucId = ? AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("1", "Khonguudai"));
		return $result->result_array();
	}
	public function getProductMayTinh(){
		$sql = "SELECT * FROM sanpham WHERE chuyenMucId = ? AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("2", "Khonguudai"));
		return $result->result_array();
	}
	public function getProductThietBiDienTu(){
		$sql = "SELECT * FROM sanpham WHERE chuyenMucId = ? AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("3", "Khonguudai"));
		return $result->result_array();
	}
}

/* End of file model_index.php */
/* Location: ./application/models/model_index.php */
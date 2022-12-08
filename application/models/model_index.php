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
	public function countProduct($khachHangId){
		$sql = "SELECT COUNT(gioHangId) as 'so luong san pham' FROM giohang WHERE khachHangId=?";
		$result = $this->db->query($sql,array($khachHangId));
		return $result->result_array();
	}

	public function getProductGiamGiaCuoiTuan(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("Giamgiacuoituan"));
		return $result->result_array();
	}
	public function getProductPhoBien(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("Phobien"));
		return $result->result_array();
	}
	public function getProductTotNhat(){
		$sql = "SELECT * FROM sanpham WHERE loaiSanPham = ?";
		$result = $this->db->query($sql, array("Totnhat"));
		return $result->result_array();
	}
	public function getProductSlide(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("Slide"));
		return $result->result_array();
	}
	public function getProductNoiBatMoi(){
		$sql = "SELECT * FROM sanpham WHERE loaiSanPham = ?";
		$result = $this->db->query($sql, array("Noibatmoi"));
		return $result->result_array();
	}
	public function getProductAudioVideo(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("Audiovideo"));
		return $result->result_array();
	}
	public function getProductLaptopComputer(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND loaiSanPham = ?";
		$result = $this->db->query($sql, array("Laptopcomputer"));
		return $result->result_array();
	}

	public function getProductQuanTam(){
		$sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 12";
		$result = $this->db->query($sql);
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

	public function getTinTuc(){
		$sql = "SELECT * FROM tintuc ORDER BY tinTucId DESC LIMIT 10";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAllTinTuc(){
		$sql = "SELECT * FROM tintuc";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

/* End of file model_index.php */
/* Location: ./application/models/model_index.php */
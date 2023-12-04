<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_profile extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getMyProfile($taikhoan){
		$sql = "SELECT * FROM nhanvien WHERE taiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function getMyProduct($taikhoan, $number = 5){
		$sql = "SELECT * FROM sanpham, nhanvien WHERE sanpham.nhanVienId = nhanvien.nhanVienId AND nhanvien.taiKhoan = ? ORDER BY sanPhamId DESC LIMIT " . $number;
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function getMyNews($taikhoan, $number = 5){
		$sql = "SELECT * FROM tintuc, nhanvien WHERE tintuc.nhanVienId = nhanvien.nhanVienId AND nhanvien.taiKhoan = ? ORDER BY tinTucId DESC LIMIT " . $number;
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function checkNumberProduct($taikhoan){
		$sql = "SELECT * FROM sanpham, nhanvien WHERE sanpham.nhanVienId = nhanvien.nhanVienId AND nhanvien.taiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function checkNumberNews($taikhoan){
		$sql = "SELECT * FROM tintuc, nhanvien WHERE tintuc.nhanVienId = nhanvien.nhanVienId AND nhanvien.taiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function searchMyProduct($taikhoan, $tenSanPham){
		$sql = "SELECT * FROM sanpham, nhanvien WHERE sanpham.nhanVienId = nhanvien.nhanVienId AND nhanvien.taiKhoan = ? AND sanpham.tenSanPham LIKE '%".$tenSanPham."%' ORDER BY sanPhamId DESC LIMIT 5";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}


}

/* End of file model_profile.php */
/* Location: ./application/models/model_profile.php */
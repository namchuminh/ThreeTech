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

	public function getMyProduct($taikhoan){
		$sql = "SELECT sanPhamId, tenSanPham, ngayDang, moTa, duongDan FROM sanpham, nhanvien WHERE sanpham.nhanVienId = nhanvien.nhanVienId AND nhanvien.taiKhoan = ? ORDER BY sanPhamId DESC";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function getMyNews($taikhoan){
		$sql = "SELECT tinTucId, tieuDe, trichDan, noiDung, ngayDang, duongDan FROM tintuc, nhanvien WHERE tintuc.nhanVienId = nhanvien.nhanVienId AND nhanvien.taiKhoan = ? ORDER BY tinTucId DESC";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

}

/* End of file model_profile.php */
/* Location: ./application/models/model_profile.php */
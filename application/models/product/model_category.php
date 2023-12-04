<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_category extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getCateByUrl($duongDanChuyenMuc)
	{
		$sql = "SELECT * FROM chuyenmuc WHERE duongDanChuyenMuc = ?";
		$result = $this->db->query($sql, array($duongDanChuyenMuc));
		return $result->result_array();
	}

	public function getProductByCateUrl($duongDanChuyenMuc)
	{
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND duongDanChuyenMuc = ?";
		$result = $this->db->query($sql, array($duongDanChuyenMuc));
		return $result->result_array();
	}

	public function filterProduct($chuyenMucId, $giaBatDau, $giaKetThuc){
		$sql = "SELECT * FROM sanpham WHERE chuyenMucId = ? AND giaBan BETWEEN ? AND ?";
		$result = $this->db->query($sql, array($chuyenMucId, $giaBatDau, $giaKetThuc));
		return $result->result_array();
	}

}

/* End of file model_category.php */
/* Location: ./application/models/model_category.php */
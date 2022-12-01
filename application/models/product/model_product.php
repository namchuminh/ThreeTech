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
}

/* End of file model_product.php */
/* Location: ./application/models/model_product.php */
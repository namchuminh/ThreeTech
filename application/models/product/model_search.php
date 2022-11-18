<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_search extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function search($tenSanPham, $tenChuyenMuc){
		$sql = "SELECT sanpham.sanPhamId, sanpham.tenSanPham, sanpham.giaBan, sanpham.giaGoc ,sanpham.anhChinh, sanpham.duongDan FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND sanpham.tenSanPham LIKE '%".$tenSanPham."%' AND chuyenmuc.tenChuyenMuc = ?";
		$result = $this->db->query($sql, array($tenChuyenMuc));
		return $result->result_array();
	}

}

/* End of file model_search.php */
/* Location: ./application/models/model_search.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_product extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getLaptop(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND chuyenmuc.tenChuyenMuc = 'Laptop'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getComputer(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND chuyenmuc.tenChuyenMuc = 'Maytinh'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAccessory(){
		$sql = "SELECT * FROM sanpham, chuyenmuc WHERE sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND chuyenmuc.tenChuyenMuc = 'Linhkien'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function addProduct($tenSanPham,$giaGoc,$giaBan,$moTa,$duongDan,$soLuong,$anhChinh,$anhPhu1,$anhPhu2,$chuyenMucId,$loaiSanPham, $nhanVienId){
		$sql = "INSERT INTO `sanpham`(`tenSanPham`, `giaGoc`, `giaBan`, `moTa`, `duongDan`,`soLuong`, `anhChinh`, `anhPhu1`, `anhPhu2`, `chuyenMucId`, `loaiSanPham`, `nhanVienId`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$result = $this->db->query($sql,array($tenSanPham,$giaGoc,$giaBan,$moTa,$duongDan,$soLuong,$anhChinh,$anhPhu1,$anhPhu2,$chuyenMucId,$loaiSanPham, $nhanVienId));
		return $result;
	}

	public function getUpdateProduct($sanPhamId){
		$sql = "SELECT * FROM sanpham WHERE sanPhamId = ?";
		$result = $this->db->query($sql, array($sanPhamId));
		return $result->result_array();
	}

	public function updateProduct($tenSanPham,$giaGoc,$giaBan,$moTa,$duongDan,$trangThai,$soLuong,$anhChinh,$anhPhu1,$anhPhu2,$chuyenMucId,$loaiSanPham, $sanPhamId){
		$sql = "UPDATE `sanpham` SET `tenSanPham`= ?,`giaGoc`= ?,`giaBan`= ?,`moTa`= ?,`duongDan`= ?,`trangThai`= ?,`soLuong`= ?,`anhChinh`= ?,`anhPhu1`= ?,`anhPhu2`= ?,`chuyenMucId`= ?,`loaiSanPham`= ? WHERE `sanPhamId`= ?";
		$result = $this->db->query($sql, array($tenSanPham,$giaGoc,$giaBan,$moTa,$duongDan,$trangThai,$soLuong,$anhChinh,$anhPhu1,$anhPhu2,$chuyenMucId,$loaiSanPham,$sanPhamId));
		return $result;
	}

	public function deleteProduct($sanPhamId){
		$sql = "DELETE FROM `sanpham` WHERE sanPhamId = ?";
		$result = $this->db->query($sql, array($sanPhamId));
		return $result;
	}

}

/* End of file model_product.php */
/* Location: ./application/models/model_product.php */
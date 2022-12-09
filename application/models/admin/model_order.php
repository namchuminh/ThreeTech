<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_order extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllOrder(){
		$sql = "SELECT vnpay.madonhang, sanpham.tenSanPham, chitiethoadon.soLuong, vnpay.sotien, vnpay.thoigian, khachhang.hoTen, khachhang.soDienThoai, khachhang.diaChi, vnpay.dagiaohang, vnpay.hoantien FROM vnpay, chitiethoadon, khachhang, sanpham WHERE vnpay.madonhang = chitiethoadon.madonhang AND vnpay.khachHangId = khachhang.khachHangId AND chitiethoadon.sanPhamId = sanpham.sanPhamId ORDER BY chitiethoadon.chitiethoadonID DESC";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function exportExcel(){
		$sql = "SELECT vnpay.madonhang, sanpham.tenSanPham, chitiethoadon.soLuong, vnpay.sotien, vnpay.thoigian, khachhang.hoTen, khachhang.soDienThoai, khachhang.diaChi, vnpay.dagiaohang, vnpay.hoantien FROM vnpay, chitiethoadon, khachhang, sanpham WHERE vnpay.madonhang = chitiethoadon.madonhang AND vnpay.khachHangId = khachhang.khachHangId AND chitiethoadon.sanPhamId = sanpham.sanPhamId ORDER BY chitiethoadon.chitiethoadonID DESC";
		$result = $this->db->query($sql)->result_array();
		
		$arrExport = array();
		for ($i = 0; $i < count($result); $i++) { 
			$arrExport[$i] = array(
				'madonhang' => $result[$i]["madonhang"],
				'tenSanPham' => $result[$i]["tenSanPham"],
				'soLuong' => $result[$i]["soLuong"],
				'sotien' => $result[$i]["sotien"],
				'thoigian' => $result[$i]["thoigian"],
				'hoTen' => $result[$i]["hoTen"],
				'soDienThoai' => $result[$i]["soDienThoai"],
				'diaChi' => $result[$i]["diaChi"],
				'dagiaohang' => $result[$i]["dagiaohang"] == 0 ? "Chưa Giao Hàng" : "Đã Giao Hàng",
				'hoantien' => $result[$i]["hoantien"] == 0 ? "Không" : "Đã Hoàn Tiền",
			);	
		}
		return $arrExport;
	}
}

/* End of file model_order.php */
/* Location: ./application/models/model_order.php */
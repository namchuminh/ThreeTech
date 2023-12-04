<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_order extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllOrder($number = 10){
		$sql = "SELECT sanpham.tenSanPham, chitiethoadon.soLuong, dathang.tenNguoiNhan AS hoTen, dathang.soDienThoai, dathang.diaChi, chitiethoadon.dagiaohang, chitiethoadon.hoantien, sanpham.giaBan, chitiethoadon.chitiethoadonID, dathang.thoigian, dathang.madonhang FROM chitiethoadon, dathang, sanpham WHERE chitiethoadon.sanPhamId = sanpham.sanPhamId AND chitiethoadon.madonhang = dathang.madonhang ORDER BY chitiethoadon.chitiethoadonID DESC LIMIT ".$number;
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function exportExcel(){
		$sql = "SELECT sanpham.tenSanPham, chitiethoadon.soLuong, dathang.tenNguoiNhan AS hoTen, dathang.soDienThoai, dathang.diaChi, chitiethoadon.dagiaohang, chitiethoadon.hoantien, sanpham.giaBan, chitiethoadon.chitiethoadonID, dathang.thoigian, dathang.madonhang FROM chitiethoadon, dathang, sanpham WHERE chitiethoadon.sanPhamId = sanpham.sanPhamId AND chitiethoadon.madonhang = dathang.madonhang ORDER BY chitiethoadon.chitiethoadonID DESC";
		$result = $this->db->query($sql)->result_array();
		
		$arrExport = array();
		for ($i = 0; $i < count($result); $i++) { 
			$arrExport[$i] = array(
				'madonhang' => $result[$i]["madonhang"],
				'tenSanPham' => $result[$i]["tenSanPham"],
				'soLuong' => $result[$i]["soLuong"],
				'giaBan' => $result[$i]["giaBan"] * $result[$i]["soLuong"] * 1000,
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

	public function checkGiaoHang($chitiethoadonID){
		$sql = "SELECT * FROM chitiethoadon WHERE dagiaohang = 1 AND chitiethoadonID = ?";
		$result = $this->db->query($sql, array($chitiethoadonID))->result_array();
		return $result;
	}

	public function updateGiaoHang($chitiethoadonID){
		$sql = "UPDATE `chitiethoadon` SET `dagiaohang`= 1 WHERE `chitiethoadonID`= ?";
		$result = $this->db->query($sql, array($chitiethoadonID));
		return $result;
	}

	public function checkHoanTien($chitiethoadonID){
		$sql = "SELECT * FROM chitiethoadon WHERE hoantien = 1 AND chitiethoadonID = ?";
		$result = $this->db->query($sql, array($chitiethoadonID))->result_array();
		return $result;
	}

	public function updateHoanTien($chitiethoadonID){
		$sqlGetSLGB = "SELECT sanpham.giaBan, chitiethoadon.soLuong, chitiethoadon.madonhang FROM sanpham, chitiethoadon WHERE chitiethoadon.sanPhamId = sanpham.sanPhamId AND chitiethoadon.chitiethoadonID = ?";
		$resultSLGB = $this->db->query($sqlGetSLGB, array($chitiethoadonID))->result_array();
		$giaBan = $resultSLGB[0]["giaBan"] * $resultSLGB[0]["soLuong"];

		$madonhang = $resultSLGB[0]["madonhang"];
		
		$sqlUpdateVNPAY = "UPDATE `vnpay` SET sotien = sotien - ".$giaBan." * 1000 WHERE madonhang = ?";
		$this->db->query($sqlUpdateVNPAY, array($madonhang));

		$sql = "UPDATE `chitiethoadon` SET `hoantien`= 1 WHERE `chitiethoadonID`= ?";
		$result = $this->db->query($sql, array($chitiethoadonID));
		return $result;
	}

	public function searchDonHang($madonhang, $soluong = 10000){
		$sql = "SELECT sanpham.tenSanPham, chitiethoadon.soLuong, dathang.tenNguoiNhan AS hoTen, dathang.soDienThoai, dathang.diaChi, chitiethoadon.dagiaohang, chitiethoadon.hoantien, sanpham.giaBan, chitiethoadon.chitiethoadonID, dathang.thoigian, dathang.madonhang FROM chitiethoadon, dathang, sanpham WHERE chitiethoadon.sanPhamId = sanpham.sanPhamId AND chitiethoadon.madonhang = dathang.madonhang AND dathang.madonhang LIKE '%".$madonhang."%' ORDER BY chitiethoadon.chitiethoadonID DESC LIMIT ".$soluong;
		$result = $this->db->query($sql);
		return $result->result_array();
	}


}

/* End of file model_order.php */
/* Location: ./application/models/model_order.php */
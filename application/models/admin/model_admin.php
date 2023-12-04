<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUserLogin($taikhoan){
		$sql = "SELECT * FROM nhanvien WHERE taiKhoan = ?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

	public function getDoanhThuHomQua(){
		$sql = "SELECT SUM(sotien) AS doanhThuHomQua FROM `vnpay` WHERE MONTH(thoigian) = MONTH(CURDATE()) AND YEAR(thoigian) = YEAR(CURRENT_DATE()) AND DAY(thoigian) = DAY(CURRENT_DATE() - 1)";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getDauNgayToiGio(){
		$sql = "SELECT SUM(sotien) AS dauNgayToiGio FROM `vnpay` WHERE DATE(`thoigian`) = CURDATE()";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function soLuongKhachHang(){
		$sql = "SELECT COUNT(*) AS soLuongKhachHang FROM `khachhang`";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getBieuDoDoanhThu(){
		$bieuDoDoanhThu = array();

		for($i = 1; $i <= 12; $i++){
			$sql = "SELECT SUM(sotien) AS bieuDoDoanhThu FROM `vnpay` WHERE MONTH(thoigian) = ".$i;
			$result = $this->db->query($sql);
			$doanhThuTungThang = $result->result_array();

			if($doanhThuTungThang[0]["bieuDoDoanhThu"] == NULL){
				array_push($bieuDoDoanhThu, 0);
			}else{
				array_push($bieuDoDoanhThu,(int)$doanhThuTungThang[0]["bieuDoDoanhThu"]);
			}
		}
		
		return $bieuDoDoanhThu;
	}

	public function getKhachHangMoi(){
		$sql = "SELECT *  FROM `khachhang` ORDER BY khachHangId DESC LIMIT 5";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getSoLuongBanByChuyenMuc()
	{
		$arrTenChuyenMuc = array("LinhKien", "MayTinh","Laptop");
		$soLuong = array();
		for ($i = 0; $i < count($arrTenChuyenMuc); $i++) { 
			$sql = "SELECT SUM(chitiethoadon.soLuong) AS soluong FROM chuyenmuc, sanpham, chitiethoadon WHERE chitiethoadon.sanPhamId = sanpham.sanPhamId AND sanpham.chuyenMucId = chuyenmuc.chuyenMucId AND chuyenmuc.tenChuyenMuc = ?";
			$result = $this->db->query($sql, array($arrTenChuyenMuc[$i]))->result_array();

			array_push($soLuong, (int)$result[0]["soluong"]);
		}

		return $soLuong;
	}

	public function getPhanTramSanPhamBanChay(){
		$sql = "SELECT sanpham.tenSanPham, sanpham.anhChinh, sanpham.sanPhamId, sanpham.duongDan, sanpham.soLuong, SUM(chitiethoadon.soLuong) AS soLuongBan FROM sanpham, chitiethoadon WHERE sanPham.sanPhamId = chitiethoadon.sanPhamId GROUP BY sanpham.tenSanPham ORDER BY soLuongBan DESC LIMIT 5";
		$result = $this->db->query($sql)->result_array();

		$arrPercent = array();

		for($i = 0; $i < count($result); $i++){
			$onePercent = 100 / (int)$result[$i]["soLuong"];
			$percent = (int)$result[$i]["soLuongBan"] * $onePercent;

			$arrPercent[$i] = array(
				'tenSanPham' => $result[$i]["tenSanPham"],
				'duongDan' => $result[$i]["duongDan"],
				'soLuong' => $result[$i]["soLuong"],
				'soLuongBan' => $result[$i]["soLuongBan"],
				'phanTram' => $percent,
				'anhChinh' => $result[$i]["anhChinh"],
			);
		}
		
		return $arrPercent;
	}

	public function getDonHangChuaGiao(){
		$sql = "SELECT *  FROM `chitiethoadon` WHERE dagiaohang = 0";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

/* End of file model_admin.php */
/* Location: ./application/models/model_admin.php */
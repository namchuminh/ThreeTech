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

	public function getDoanhThuThangNay(){
		$sql = "SELECT SUM(sotien) AS doanhThuThang FROM `vnpay` WHERE MONTH(thoigian) = MONTH(CURDATE())";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getDauNgayToiGio(){
		$sql = "SELECT SUM(sotien) AS dauNgayToiGio FROM `vnpay` WHERE thoigian < CURDATE() + 1 AND thoigian > CURDATE() - 1";
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

}

/* End of file model_admin.php */
/* Location: ./application/models/model_admin.php */
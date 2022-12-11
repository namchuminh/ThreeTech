<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
	}

	public function index()
	{
		$this->load->model('admin/model_admin');
		$tieuDe = "ThreeTech - Trang quản trị Admin!";
		$taiKhoan = $this->session->userdata('taikhoan');

		$getDoanhThuHomQua = $this->model_admin->getDoanhThuHomQua();
		$dauNgayToiGio = $this->model_admin->getDauNgayToiGio();
		$soLuongKhachHang = $this->model_admin->soLuongKhachHang();
		$getKhachHangMoi = $this->model_admin->getKhachHangMoi();
		$phanTramSanPhamBanChay = $this->model_admin->getPhanTramSanPhamBanChay();
		$donHangChuaGiao = $this->model_admin->getDonHangChuaGiao();

		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
			'getDoanhThuHomQua' => $getDoanhThuHomQua,
			'dauNgayToiGio' => $dauNgayToiGio,
			'soLuongKhachHang' => $soLuongKhachHang,
			'getKhachHangMoi' => $getKhachHangMoi,
			'phanTramSanPhamBanChay' => $phanTramSanPhamBanChay,
			'donHangChuaGiao' => count($donHangChuaGiao),
		);
		return $this->load->view('admin/index', $data);
	}

	public function getBieuDoDoanhThu(){
		$this->load->model('admin/model_admin');
		$bieuDoDoanhThu = $this->model_admin->getBieuDoDoanhThu();
		$result = json_encode($bieuDoDoanhThu);
		echo $result;
	}

	public function getSoLuongBanByChuyenMuc(){
		$this->load->model('admin/model_admin');
		$getSoLuongBanByChuyenMuc = $this->model_admin->getSoLuongBanByChuyenMuc();

		$result = json_encode($getSoLuongBanByChuyenMuc);

		echo $result;
	}


	public function logout(){
		$this->session->sess_destroy();
		return redirect(base_url('admin/dang-nhap/'));
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('model_index');
		$uudai = $this->model_index->getProductUuDai();
		$giamgia = $this->model_index->getProductGiamGia();
		$laptop = $this->model_index->getProductLaptop();
		$maytinh = $this->model_index->getProductMayTinh();
		$thietbidientu = $this->model_index->getProductThietBiDienTu();

		
		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'uudai' => $uudai,
				'giamgia' => $giamgia,
				'laptop' => $laptop,
				'maytinh' => $maytinh,
				'thietbidientu' => $thietbidientu,
				'soluonsanpham' =>$soLuongSanPham,
			);
			return $this->load->view('view_index', $data);
		}else{
			$data = array(
				'uudai' => $uudai,
				'giamgia' => $giamgia,
				'laptop' => $laptop,
				'maytinh' => $maytinh,
				'thietbidientu' => $thietbidientu,
			);
			return $this->load->view('view_index', $data);
		}
		
	}
	
}


/* End of file index.php */
/* Location: ./application/controllers/index.php */
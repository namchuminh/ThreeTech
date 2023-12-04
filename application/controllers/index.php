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
		$giamgiacuoituan = $this->model_index->getProductGiamGiaCuoiTuan();
		$phobien = $this->model_index->getProductPhoBien();
		$totnhat = $this->model_index->getProductTotNhat();
		$slide = $this->model_index->getProductSlide();
		$noibatmoi = $this->model_index->getProductNoiBatMoi();
		$audiovideo = $this->model_index->getProductAudioVideo();
		$laptopcomputer = $this->model_index->getProductLaptopComputer();
		$cothebanquantam = $this->model_index->getProductQuanTam();
		$top20 = $this->model_index->getProductTop20();
		$trend = $this->model_index->getProductTrend();
		$tintuc = $this->model_index->getTinTuc();
		$this->load->model('cart/model_addToCart');


		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'thietbidientu' => $thietbidientu,
				'soluongsanpham' =>$soLuongSanPham,
				'giamgiacuoituan' => $giamgiacuoituan,
				'phobien' => $phobien,
				'uudai' => $uudai,
				'totnhat' => $totnhat,
				'slide' => $slide,
				'noibatmoi' => $noibatmoi,
				'audiovideo' => $audiovideo,
				'laptopcomputer' => $laptopcomputer,
				'cothebanquantam' => $cothebanquantam,
				'top20' => $top20,
				'trend' => $trend,
				'tintuc' => $tintuc,
				'cart_price'=>$cart_price,
			);
			return $this->load->view('view_index', $data);
		}else{
			$data = array(
				'giamgiacuoituan' => $giamgiacuoituan,
				'phobien' => $phobien,
				'uudai' => $uudai,
				'totnhat' => $totnhat,
				'slide' => $slide,
				'noibatmoi' => $noibatmoi,
				'audiovideo' => $audiovideo,
				'laptopcomputer' => $laptopcomputer,
				'cothebanquantam' => $cothebanquantam,
				'top20' => $top20,
				'trend' => $trend,
				'tintuc' => $tintuc,
			);
			return $this->load->view('view_index', $data);
		}
		
	}

	
}


/* End of file index.php */
/* Location: ./application/controllers/index.php */
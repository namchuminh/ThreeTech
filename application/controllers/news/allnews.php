<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allnews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('model_index');
		$this->load->model('cart/model_addToCart');

		$tintuc = $this->model_index->getAllTinTuc();

		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$data = array(
				'tintuc' => $tintuc,
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'cart_price'=>$cart_price,
				'soluongsanpham' =>$soLuongSanPham,
			);
			return $this->load->view('news/newsAll', $data);
		}else{
			$data = array(
				'tintuc' => $tintuc,
			);
			return $this->load->view('news/newsAll', $data);
		}
	}
}

/* End of file allnews.php */
/* Location: ./application/controllers/news/allnews.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class newsDetail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($duongDan)
	{
		$this->load->model('news/model_news');
		$this->load->model('model_index');
		$this->load->model('cart/model_addToCart');
		$checkNumberTinTuc = $this->model_news->checkNumberTinTuc($duongDan);


		if($this->session->has_userdata('khachhang')){

			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);

			if (count($checkNumberTinTuc) >=1){
				$tinTuc = $this->model_news->getTinTucByDuongDan($duongDan);
				$tintuclienquan = $this->model_news->getTinTucLienQuan();
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'tinTuc' => $tinTuc,
					'tintuclienquan' => $tintuclienquan,
					'cart_price' => $cart_price,
					'soluongsanpham' => $soLuongSanPham,
				);
				return $this->load->view('news/newsDetail', $data, FALSE);
			}else{
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'cart_price' => $cart_price,
					'soluongsanpham' => $soLuongSanPham,
				);
				return $this->load->view('view_404', $data, FALSE);
			}
		}else{
			if (count($checkNumberTinTuc) >=1){
				$tinTuc = $this->model_news->getTinTucByDuongDan($duongDan);
				$tintuclienquan = $this->model_news->getTinTucLienQuan();
				$data = array(
					'tinTuc' => $tinTuc,
					'tintuclienquan' => $tintuclienquan,
				);
				return $this->load->view('news/newsDetail', $data, FALSE);
			}else{
				return $this->load->view('view_404', FALSE);
			}
		}
		
	}

}

/* End of file newsDetail.php */
/* Location: ./application/controllers/newsDetail.php */
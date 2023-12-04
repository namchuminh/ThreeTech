<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/model_admin');
	}

	public function index($duongDanChuyenMuc)
	{
		$this->load->model('model_index');
		$this->load->model('product/model_category');
		$this->load->model('cart/model_addToCart');
		$checkNumberCategory = $this->model_category->getCateByUrl($duongDanChuyenMuc);

		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			if(count($checkNumberCategory) >= 1){
				$product = $this->model_category->getProductByCateUrl($duongDanChuyenMuc);
				$this->load->model('model_index');
				$cothebanquantam = $this->model_index->getProductQuanTam();
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'product' => $product,
					'cothebanquantam' => $cothebanquantam,
					'soluongsanpham' => $soLuongSanPham,
					'cart_price' => $cart_price,
				);
				return $this->load->view('product/productCategory', $data, FALSE);
			}else{
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'soluongsanpham' => $soLuongSanPham,
					'cart_price' => $cart_price,
				);
				return $this->load->view('view_404', $data);
			}
		}else{
			if(count($checkNumberCategory) >= 1){
				$product = $this->model_category->getProductByCateUrl($duongDanChuyenMuc);
				$this->load->model('model_index');
				$cothebanquantam = $this->model_index->getProductQuanTam();
				$data = array(
					'product' => $product,
					'cothebanquantam' => $cothebanquantam,
				);
				return $this->load->view('product/productCategory', $data, FALSE);
			}else{
				return $this->load->view('view_404');
			}
		}
	}

	public function filterProduct(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url());
		} 

		$this->load->model('product/model_category');

		$chuyenMucId = $this->input->post('chuyenMucId');
		$giaBatDau = $this->input->post('giaBatDau');
		$giaKetThuc = $this->input->post('giaKetThuc');

		$product = $this->model_category->filterProduct($chuyenMucId, $giaBatDau, $giaKetThuc);

		$result = json_encode($product);

		echo $result;
	}

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */
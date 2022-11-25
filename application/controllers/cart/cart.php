<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')==False){
			return redirect(base_url());
		}
	}

	public function index()
	{
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		// echo $khachHangId;
		$this->load->model('cart/model_addToCart');
		$cart_product = $this->model_addToCart->CartKH($khachHangId);
		// var_dump($cart_product);
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$data = array(
			'product' => $cart_product,
			'soLuongSanPham' =>$soLuongSanPham,
		);
		return $this->load->view('cart/cart', $data);
	}
	public function addToCart(){
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		echo $khachHangId;
		$sanPhamId = $this->input->post('sanPhamId');
		$tenSanPham = $this->input->post('tenSanPham');
		$giaBan = $this->input->post('giaBan');
		$anhChinh = $this->input->post('anhChinh');
		$this->load->model('cart/model_addToCart');
		$cart_product = $this->model_addToCart->Cart($sanPhamId, $khachHangId);
		if($cart_product>0){
			$this->load->model('cart/model_addToCart');
			$result = $this->model_addToCart->updateCart($sanPhamId, $khachHangId);
			$cart_product = $this->model_addToCart->Cart($sanPhamId, $khachHangId);
			var_dump($cart_product);
			// return $this->load->view('cart/cart', $cart_product);
			return redirect(base_url('gio-hang/'));
		}else{
			$this->load->model('cart/model_addToCart');
			$add = $this->model_addToCart->addToCart($sanPhamId, $khachHangId);
			if($result==True){
				$message = "Thành Công!";
				echo "<script type='text/javascript'>alert('$message');</script>";
				$data = array(
					'id' => $sanPhamId,
					'tenSanPham' => $tenSanPham,
					'giaBan' => $giaBan,
					'anhChinh' => $anhChinh,
				);
				var_dump($data);
				return redirect(base_url('gio-hang/'));
			}else{
				$data = array(
					'mess' => "thất bại!",
				);
				return redirect(base_url('gio-hang/'));
			}
		}
		
	}
	public function deleteCart(){
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		$sanPhamId = $this->input->post('sanPhamId');
		$this->load->model('cart/model_addToCart');
		$deleteCart = $this->model_addToCart->deleteProduct($sanPhamId, $khachHangId);
		if($deleteCart==True){
			$message = "Thành Công!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			return redirect(base_url('gio-hang/'));
		}
	}
	public function updateNumberProduct(){
		$soLuong = $this->input->post('soLuong');
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		$sanPhamId = $this->input->post('sanPhamId');
		$this->load->model('cart/model_addToCart');
		$updateCart = $this->model_addToCart->updateNumberProduct($soLuong, $sanPhamId, $khachHangId);
		if($updateCart==True){
			$message = "Thành Công!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			return redirect(base_url('gio-hang/'));
		}else{
			$message = "TB!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		
	}
}

/* End of file userInfo.php */
/* Location: ./application/controllers/userInfo.php */
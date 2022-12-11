<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')==False){
			return redirect(base_url('/dang-nhap'));
		}
	}

	public function index()
	{
		$logged_in = $this->session->userdata('logged_in');
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		// echo $khachHangId;
		$this->load->model('cart/model_addToCart');
		$cart_product = $this->model_addToCart->CartKH($khachHangId);
		// var_dump($cart_product);
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$cart_price = $this->model_addToCart->cart_price($khachHangId);

		if($this->session->userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'product' => $cart_product,
				'soLuongSanPham' =>$soLuongSanPham,
				'cart_price'=> $cart_price,
			);
			return $this->load->view('cart/cart', $data);
		}else{
			$data = array(
				'product' => $cart_product,
				'soLuongSanPham' =>$soLuongSanPham,
			);
			return $this->load->view('cart/cart', $data);
		}
	}
	public function addToCart(){
		//lay id khach hang
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		echo $khachHangId;

		// lay tt san pham
		$sanPhamId = $this->input->post('sanPhamId');
		$tenSanPham = $this->input->post('tenSanPham');
		$giaBan = $this->input->post('giaBan');
		$anhChinh = $this->input->post('anhChinh');

		//them vao gio hang
		$this->load->model('cart/model_addToCart');
		$cart_product = $this->model_addToCart->Cart($sanPhamId, $khachHangId);


		$this->load->model('product/model_product');
		$product = $this->model_product->getProductByeId($sanPhamId);
		var_dump($product);


		if($cart_product>0){
			$this->load->model('cart/model_addToCart');
			$result = $this->model_addToCart->updateCart($sanPhamId, $khachHangId);
			$cart_product = $this->model_addToCart->Cart($sanPhamId, $khachHangId);
			$data = array(
				'mess' => "Thêm thành công!",
			);
			return redirect(base_url('san-pham/').$product[0]['duongDan'], $data);
		}else{
			$this->load->model('cart/model_addToCart');
			$add = $this->model_addToCart->addToCart($sanPhamId, $khachHangId);
			if($result==True){

				return redirect(base_url('san-pham/').$product[0]['duongDan']);
			}else{
				return redirect(base_url('san-pham/').$product[0]['duongDan']);
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
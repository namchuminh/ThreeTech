<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userInfo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')==False){
			return redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->model('cart/model_addToCart');
		$this->load->model('model_index');
		$khachhang = $this->session->userdata('khachhang');
		$logged_in = $this->session->userdata('logged_in');
		$kh = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $kh[0]['khachHangId'];
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$result = $this->model_index->getCustomerLogin($khachhang);
		$this->load->model('thanhtoan/model_vnpay');
		$cart = $this->model_vnpay->giaohang($khachHangId);

		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$cart_price = $this->model_addToCart->cart_price($khachHangId);
		//var_dump($cart);
		$data = array(
			'soLuongSanPham'=>$soLuongSanPham,
			'cart_price'=>$cart_price,
			'cart'=>$cart,
			'customer' => $result,
			'khachhang' => $khachhang,
			'logged_in' => $logged_in,
			'soluonsanpham' => $soLuongSanPham,
		);
		return $this->load->view('user/userInfo',$data);
	}
	public function updateProfile()
	{
		$logged_in = $this->session->userdata('logged_in');
		$this->load->model('thanhtoan/model_vnpay');
		$this->load->model('cart/model_addToCart');
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		$hoTen =$this->input->post('hoTen');
		$soDienThoai=$this->input->post('soDienThoai');		
		$diaChi=$this->input->post('diaChi');
		$matkhau= $this->input->post('matKhau');
		$old_matkhau= $this->input->post('old_matKhau');

		$cart = $this->model_vnpay->giaohang($khachHangId);
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$cart_price = $this->model_addToCart->cart_price($khachHangId);

		$this->load->library('user');

		if($hoTen=='' || $soDienThoai=='' || $diaChi==''){
			$result = $this->model_index->getCustomerLogin($khachhang);
			$data = array(
				'soLuongSanPham'=>$soLuongSanPham,
				'cart_price'=>$cart_price,
				'cart'=>$cart,
				'customer' => $result,
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'err'=>"Vui lòng đầy đủ thông tin",
			);
			$this->load->view('user/userInfo',$data);
			return;
		}


		if($this->user->checkUserName($hoTen)!= True){
			$result = $this->model_index->getCustomerLogin($khachhang);
			$data = array(
				'customer' => $result,
				'errht'=>"Vui lòng nhập lại họ tên",
			);
			$this->load->view('user/userInfo',$data);
			return;
		}

		if($this->user->checkSdt($soDienThoai)!= True){
			$result = $this->model_index->getCustomerLogin($khachhang);
			$data = array(
				'soLuongSanPham'=>$soLuongSanPham,
				'cart_price'=>$cart_price,
				'cart'=>$cart,
				'customer' => $result,
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'errdt'=>"Vui lòng nhập lại số điện thoại",
			);
			$this->load->view('user/userInfo',$data);
			return;
		}


		$this->load->model('user/model_update');
		if($matkhau=='' || $matkhau==null){
			$update = $this->model_update->updateProfile($hoTen, $soDienThoai, $diaChi, $khachHangId);
			$mess = "ok";
			$result = $this->model_index->getCustomerLogin($khachhang);
			$data = array(
				'soLuongSanPham'=>$soLuongSanPham,
				'cart_price'=>$cart_price,
				'cart'=>$cart,
				'customer' => $result,
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'tt'=>$mess,
			);
			
			$this->load->view('user/userInfo',$data);

		}else{
			if($result[0]['matKhau'] == md5($old_matkhau)){
				$update = $this->model_update->updateProfileFull($hoTen, $soDienThoai, $diaChi, md5($matkhau), $khachHangId);
				$mess = "ok";
				$result = $this->model_index->getCustomerLogin($khachhang);
				$data = array(
					'soLuongSanPham'=>$soLuongSanPham,
					'cart_price'=>$cart_price,
					'cart'=>$cart,
					'customer' => $result,
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'tt'=>$mess,
				);
				
				$this->load->view('user/userInfo',$data);
			}else{

				$result = $this->model_index->getCustomerLogin($khachhang);
				$data = array(
					'soLuongSanPham'=>$soLuongSanPham,
					'cart_price'=>$cart_price,
					'cart'=>$cart,
					'customer' => $result,
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'messmk' => "Mật khẩu Không Đúng",
				);
				
				$this->load->view('user/userInfo',$data);
			}
			
		}
		
	}

}

/* End of file userInfo.php */
/* Location: ./application/controllers/userInfo.php */
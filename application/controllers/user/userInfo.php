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
		$this->load->model('model_index');
		$khachhang = $this->session->userdata('khachhang');
		$logged_in = $this->session->userdata('logged_in');
		$kh = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $kh[0]['khachHangId'];
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$result = $this->model_index->getCustomerLogin($khachhang);
		$this->load->model('thanhtoan/model_vnpay');
		$cart = $this->model_vnpay->giaohang($khachHangId);
		//var_dump($cart);
		$data = array(
			// 'chitietsanpham'=>$ctsp,
			// 'chitiethoadon'=>$cthd,
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
		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);



		$khachHangId = $result[0]['khachHangId'];
		$hoTen =$this->input->post('hoTen');


		$soDienThoai=$this->input->post('soDienThoai');
		
		$diaChi=$this->input->post('diaChi');

		$matkhau= $this->input->post('matKhau');
		
		


		$this->load->model('user/model_update');
		if($matkhau=='' || $matkhau==null){
			$update = $this->model_update->updateProfile($hoTen, $soDienThoai, $diaChi, $khachHangId);
		}else{
			$update = $this->model_update->updateProfileFull($hoTen, $soDienThoai, $diaChi, md5($matkhau), $khachHangId);
		}
		$result = $this->model_index->getCustomerLogin($khachhang);
		$data = array(
			'customer' => $result,
			'mess'=>$message,
		);
		$this->load->view('user/userInfo',$data);
		redirect(base_url('khach-hang/'));
	}

}

/* End of file userInfo.php */
/* Location: ./application/controllers/userInfo.php */
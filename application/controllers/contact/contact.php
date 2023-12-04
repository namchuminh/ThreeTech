<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('model_index');
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
				'cart_price'=>$cart_price,
				'soluongsanpham' =>$soLuongSanPham,
			);
			return $this->load->view('contact/contact', $data);
		}else{
			return $this->load->view('contact/contact');
		}

	}

	public function actionContact(){
		if(!isset($_POST) || empty($_POST)){
			return redirect(base_url('lien-he/'));
		}

		$hoTen = $this->input->post('hoTen');
		$email = $this->input->post('email');
		$soDienThoai = $this->input->post('soDienThoai');
		$tinNhan = $this->input->post('tinNhan');

		$this->load->model('contact/model_contact');

		$result = $this->model_contact->addContact($hoTen, $email, $soDienThoai, $tinNhan);

		echo $result;

	}
}

/* End of file contact.php */
/* Location: ./application/controllers/contact/contact.php */
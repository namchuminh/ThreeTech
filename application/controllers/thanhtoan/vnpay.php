

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vnpay extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$vnp_TmnCode = "BZH5HZSG"; //Website ID in VNPAY System
		$vnp_HashSecret = "ZKGVBJNUIXYTLKAZFUFQKHHJTSMIYBNA"; //Secret key
		$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
		$vnp_Returnurl = "http://localhost/ThreeTech/xu-ly-thanh-toan";
		$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
		//Config input format
		//Expire
		$startTime = date("YmdHis");
		$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
		$vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
		$vnp_OrderInfo = "thanh toan vnpay";
		$vnp_OrderType = "order";
		$vnp_Amount = ($this->input->post('amount'))*100;
		$vnp_Locale = 'vn';
		$vnp_BankCode = $this->input->post('bank_code');
		$hoten = $this->input->post('txt_ship_fullname');
		$sdt = $this->input->post('txt_ship_mobile');
		$diachi = $this->input->post('txt_ship_city');



		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		// echo $khachHangId;
		$this->load->model('cart/model_addToCart');
		$cart_product = $this->model_addToCart->CartKH($khachHangId);
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);


		if(empty($hoten)){
			$data = array(
				'messht' => "Vui lòng nhập họ và tên!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
			);
			return $this->load->view('cart/cart', $data);
		}

		if(empty($vnp_BankCode)){
			$data = array(
				'messgh' => "Vui lòng chọn ngân hàng!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
			);
			return $this->load->view('cart/cart', $data);
		}
		
		if(empty($sdt)){
			$data = array(
				'messsdt' => "Vui lòng nhập số điện thoại!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
			);
			return $this->load->view('cart/cart', $data);
		}
		if(empty($diachi)){
			$data = array(
				'messdc' => "Vui lòng nhập địa chỉ!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
			);
			return $this->load->view('cart/cart', $data);
		}
		$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
		


		$inputData = array(
		    "vnp_Version" => "2.1.0",
		    "vnp_TmnCode" => $vnp_TmnCode,
		    "vnp_Amount" => $vnp_Amount,
		    "vnp_Command" => "pay",
		    "vnp_CreateDate" => date('YmdHis'),
		    "vnp_CurrCode" => "VND",
		    "vnp_IpAddr" => $vnp_IpAddr,
		    "vnp_Locale" => $vnp_Locale,
		    "vnp_OrderInfo" => $vnp_OrderInfo,
		    "vnp_OrderType" => $vnp_OrderType,
		    "vnp_ReturnUrl" => $vnp_Returnurl,
		    "vnp_TxnRef" => $vnp_TxnRef
		);
		if (isset($vnp_BankCode) && $vnp_BankCode != "") {
		    $inputData['vnp_BankCode'] = $vnp_BankCode;
		}
		if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
		    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
		}
		ksort($inputData);
		$query = "";
		$i = 0;
		$hashdata = "";
		foreach ($inputData as $key => $value) {
		    if ($i == 1) {
		        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
		    } else {
		        $hashdata .= urlencode($key) . "=" . urlencode($value);
		        $i = 1;
		    }
		    $query .= urlencode($key) . "=" . urlencode($value) . '&';
		}
		$vnp_Url = $vnp_Url . "?" . $query;
		if (isset($vnp_HashSecret)) {
		    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
		    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
		}
		$returnData = array('code' => '00'
		    , 'message' => 'success'
		    , 'data' => $vnp_Url);
	    if (isset($_POST['redirect'])) {
	        header('Location: ' . $vnp_Url);
	        die();
	    } else {
	        echo json_encode($returnData);
	    }
	}

	public function thanhtoan(){

		$_GET['vnp_TxnRef'];//ma don hang
		$_GET['vnp_Amount']; // so tien
		$_GET['vnp_OrderInfo'];// noi dung
		$_GET['vnp_BankCode'];// ngan hang
		$_GET['vnp_TransactionNo'];// Mã GD Tại VNPAY
		$_GET['vnp_PayDate'];// ngay tao
		$_GET['vnp_ResponseCode'];// ket qua
		// $newformat = date('Y-m-d',$_GET['vnp_PayDate']);
		// echo $newformat;
		if($_GET['vnp_ResponseCode'] == '00'){
			$khachhang = $this->session->userdata('khachhang');
			$this->load->model('model_index');
			$result = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $result[0]['khachHangId'];
			$this->load->model('thanhtoan/model_vnpay');
			$result = $this->model_vnpay->add($khachHangId,$_GET['vnp_TxnRef'],$_GET['vnp_Amount'], $_GET['vnp_OrderInfo'],$_GET['vnp_BankCode'], $_GET['vnp_PayDate'], $_GET['vnp_TransactionNo']);
			if($result>0){
				$this->load->model('cart/model_addToCart');
				$cart_product = $this->model_addToCart->CartKH($khachHangId);
				$this->load->model('thanhtoan/model_hoadon');
				foreach ($cart_product as $key => $value){

					$kq = $this->model_hoadon->chitiethoadon($_GET['vnp_TxnRef'],$value['sanPhamId'],$value['so luong ban'] );
					$update = $this->model_hoadon->updateProduct($value['so luong ban'], $value['sanPhamId']);

				} 
				$xoa = $this->model_addToCart->deleteCart($khachHangId);
				
				return $this->load->view('thanhtoan/view_thanhtoan');
			}
		}
	}
}



<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class vnpay extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')==False){
			return redirect(base_url('dang-nhap/'));
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
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$khachhang = $this->session->userdata('khachhang');
		$logged_in = $this->session->userdata('logged_in');

		$hoten = $this->input->post('txt_ship_fullname');
		$sdt = $this->input->post('txt_ship_mobile');
		$diachi = $this->input->post('txt_ship_city');

		if(empty($this->input->post('bank_code'))){
			if(empty($hoten)){
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'messht' => "Vui lòng nhập họ và tên!",
					'soLuongSanPham' =>$soLuongSanPham,
					'product' => $cart_product,
				);
				return $this->load->view('thanhtoan/view_dathang', $data);
			}

			if(empty($sdt)){
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'messsdt' => "Vui lòng nhập số điện thoại!",
					'soLuongSanPham' =>$soLuongSanPham,
					'product' => $cart_product,
				);
				return $this->load->view('thanhtoan/view_dathang', $data);
			}
			if(empty($diachi)){
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'messdc' => "Vui lòng nhập địa chỉ!",
					'soLuongSanPham' =>$soLuongSanPham,
					'product' => $cart_product,
				);
				return $this->load->view('thanhtoan/view_dathang', $data);
			}

			$madonhang = rand(1111111111,9999999999);
			$madonhang = $madonhang;
			$tongtien = 0;

			$this->load->model('thanhtoan/model_dathang');
			$rs = $this->model_dathang->dathang($madonhang, $hoten, $sdt, $diachi);

			$this->load->model('cart/model_addToCart');
			$cart_product = $this->model_addToCart->CartKH($khachHangId);
			$this->load->model('thanhtoan/model_hoadon');
			$this->load->model('product/model_product');
			foreach ($cart_product as $key => $value){
				$kq = $this->model_hoadon->chitiethoadon($madonhang,$value['sanPhamId'],$value['so luong ban'] );
				$update = $this->model_hoadon->updateProduct($value['so luong ban'], $value['sanPhamId']);
				$tongtien += $value['so luong ban'] * $this->model_product->getProductByeId($value['sanPhamId'])[0]['giaBan'];
			} 
			$xoa = $this->model_addToCart->deleteCart($khachHangId);
			$data['madonhang'] = $madonhang;
			$data['tongtien'] = $tongtien; 
			return $this->load->view('thanhtoan/view_thanhtoantratien', $data);

		}


		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$vnp_TmnCode = "HZZDIQAT"; //Website ID in VNPAY System
		$vnp_HashSecret = "HPRWNMDULHVIIPXUCNLXHLIDPSARMLSZ"; //Secret key
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



		if(empty($hoten)){
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'messht' => "Vui lòng nhập họ và tên!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
			);
			return $this->load->view('thanhtoan/view_dathang', $data);
		}

		if(empty($vnp_BankCode)){
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'messgh' => "Vui lòng chọn ngân hàng!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
			);
			return $this->load->view('thanhtoan/view_dathang', $data);
		}
		
		if(empty($sdt)){
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'messsdt' => "Vui lòng nhập số điện thoại!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
			);
			return $this->load->view('thanhtoan/view_dathang', $data);
		}
		if(empty($diachi)){
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'messdc' => "Vui lòng nhập địa chỉ!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
			);
			return $this->load->view('thanhtoan/view_dathang', $data);
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
		    "vnp_TxnRef" => $vnp_TxnRef,
		    "vnp_Bill_FirstName"=>$hoten,
		    "vnp_Bill_Mobile"=>$sdt,
		    "vnp_Bill_City"=>$diachi,
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


		$this->load->model('thanhtoan/model_dathang');
		$rs = $this->model_dathang->dathang($vnp_TxnRef, $hoten, $sdt, $diachi);

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

		// $date = $_GET['vnp_PayDate'];

		// $year = $date[0].''.$date[1].''.$date[2].''.$date[3];
		// $mounht = $date[4].''.$date[5];

		// $days = $date[6].''.$date[7];
		// $hours = $date[8].''.$date[9];
		// $minute = $date[10].''.$date[11];
		// $second = $date[12].''.$date[13];
		// // echo $date;
		// // echo "<br>";
		// // echo $year.$mounht.$days.$hours.$minute.$second;
		// $time = $year."-".$mounht."-".$days."-".$hours."-".$minute."-".$second;

		$khachhang = $this->session->userdata('khachhang');
		$this->load->model('model_index');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		// echo $khachHangId;
		$this->load->model('cart/model_addToCart');
		$cart_product = $this->model_addToCart->CartKH($khachHangId);
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$khachhang = $this->session->userdata('khachhang');
		$logged_in = $this->session->userdata('logged_in');
		$cart_price = $this->model_addToCart->cart_price($khachHangId);

		if($_GET['vnp_ResponseCode'] == '00'){
			$khachhang = $this->session->userdata('khachhang');
			$this->load->model('model_index');
			$result = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $result[0]['khachHangId'];
			$this->load->model('thanhtoan/model_vnpay');
			$result = $this->model_vnpay->add($khachHangId,$_GET['vnp_TxnRef'],$_GET['vnp_Amount']/100, $_GET['vnp_OrderInfo'],$_GET['vnp_BankCode'], $_GET['vnp_TransactionNo']);
			if($result>0){
				$this->load->model('cart/model_addToCart');
				$cart_product = $this->model_addToCart->CartKH($khachHangId);
				$this->load->model('thanhtoan/model_hoadon');
				foreach ($cart_product as $key => $value){

					$kq = $this->model_hoadon->chitiethoadon($_GET['vnp_TxnRef'],$value['sanPhamId'],$value['so luong ban'] );
					$update = $this->model_hoadon->updateProduct($value['so luong ban'], $value['sanPhamId']);

				} 
				$xoa = $this->model_addToCart->deleteCart($khachHangId);
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'messht' => "Vui lòng nhập họ và tên!",
					'soLuongSanPham' =>$soLuongSanPham,
					'product' => $cart_product,
					'cart_price'=> $cart_price,
				);
				return $this->load->view('thanhtoan/view_thanhtoan', $data);
			}
		}else{
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'messht' => "Vui lòng nhập họ và tên!",
				'soLuongSanPham' =>$soLuongSanPham,
				'product' => $cart_product,
				'cart_price'=> $cart_price,
			);
			return $this->load->view('thanhtoan/view_thanhtoan', $data);
		}
	}

	public function dathang(){
		$sum = $this->input->post('tongtien');
		// $hoten = $this->input->post('txt_ship_fullname');
		// $sdt = $this->input->post('txt_ship_mobile');
		// $diachi = $this->input->post('txt_ship_city');


		$this->load->model('thanhtoan/model_dathang');
		$this->load->model('model_index');
		$khachhang = $this->session->userdata('khachhang');
		$result = $this->model_index->getCustomerLogin($khachhang);
		$khachHangId = $result[0]['khachHangId'];
		// echo $khachHangId;
		$this->load->model('cart/model_addToCart');
		$cart_product = $this->model_addToCart->CartKH($khachHangId);
		$soLuongSanPham = $this->model_index->countProduct($khachHangId);
		$khachhang = $this->session->userdata('khachhang');
		$logged_in = $this->session->userdata('logged_in');
		$cart_price = $this->model_addToCart->cart_price($khachHangId);
		$data = array(	
			'tongtien'=>$sum,
			'khachhang' => $khachhang,
			'logged_in' => $logged_in,
			'soLuongSanPham' => $soLuongSanPham,
			'cart_price'=> $cart_price,
		);
		$this->load->view('thanhtoan/view_dathang', $data);
	}
}


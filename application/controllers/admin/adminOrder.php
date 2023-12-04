<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminOrder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
	}

	public function index()
	{
		$tieuDe = "ThreeTech - Quản Lý Đơn Hàng";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->load->model('admin/model_order');
		$order = $this->model_order->getAllOrder();
		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
			'order' => $order,
		);
		return $this->load->view('admin/order', $data, FALSE);
	}

	public function exportExcel(){
		$this->load->model('admin/model_order');
		$result = $this->model_order->exportExcel();
		header("Content-Disposition: attachment; filename=\"don_hang.xls\"");
		header("Pragma: no-cache");
		header("Expires: 0");
		header('Content-Type: text/html; charset=utf-8');
		$out = fopen("php://output", 'w');
		fputs($out, $bom = chr(0xEF) . chr(0xBB) . chr(0xBF) );

		$header = array('Mã Đơn Hàng', 'Tên Sản Phẩm', 'Số Lượng', 'Giá Bán', 'Thời Gian', 'Họ Tên', 'Số Điện Thoại', 'Địa Chỉ', 'Trạng Thái', 'Hoàn Tiền');

		fputcsv($out,$header,";");
		foreach ($result as $data)
		{
		    fputcsv($out,$data,";");
		}
		fclose($out);  
	}

	public function loadMore(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/don-hang/'));
		}

		$start = $this->input->post('start');
		$this->load->model('admin/model_order');
		$resultCheckCount = $this->model_order->getAllOrder(10000);
		if ($start <= count($resultCheckCount)){
			$result = $this->model_order->getAllOrder($start);
			$data = json_encode($result);
			echo $data;
		}else{
			$data = json_encode($resultCheckCount);
			echo $data;
		}
	}

	public function giaoHang(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/don-hang/'));
		}

		$chitiethoadonID = $this->input->post('chitiethoadonID');
		$this->load->model('admin/model_order');
		$result = $this->model_order->checkGiaoHang($chitiethoadonID);

		if(count($result) <= 0){
			$updateGiaoHang = $this->model_order->updateGiaoHang($chitiethoadonID);
			if($updateGiaoHang == True){
				echo "thanhcong";
			}
		}else{
			echo "Đơn Hàng Này Đã Được Giao Trước Đó!";
		}

	}

	public function hoanTien(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/don-hang/'));
		}

		$chitiethoadonID = $this->input->post('chitiethoadonID');
		$this->load->model('admin/model_order');
		$result = $this->model_order->checkHoanTien($chitiethoadonID);

		if(count($result) <= 0){
			$updateHoanTien= $this->model_order->updateHoanTien($chitiethoadonID);
			if($updateHoanTien == True){
				echo "thanhcong";
			}
		}else{
			echo "Đơn Hàng Này Đã Được Hoàn Tiền Trước Đó!";
		}
	}


	public function searchDonHang(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/don-hang/'));
		}

		if(isset($_POST['soluong'])){
			$madonhang = $this->input->post('madonhang');
			$this->load->model('admin/model_order');
			$result = $this->model_order->searchDonHang($madonhang, 10);
			$data = json_encode($result);
			echo $data; 
		}

		if(isset($_POST['madonhang'])){
			$madonhang = $this->input->post('madonhang');
			$this->load->model('admin/model_order');
			$result = $this->model_order->searchDonHang($madonhang);

			$data = json_encode($result);
			echo $data; 
		}
		
	}
}

/* End of file adminOrder.php */
/* Location: ./application/controllers/adminOrder.php */
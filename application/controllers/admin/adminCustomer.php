<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminCustomer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
	}

	public function index()
	{
		$tieuDe = "ThreeTech - Quản Lý Nhân Viên";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->load->model('admin/model_customer');
		$customer = $this->model_customer->getAllCustomer();
		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
			'customer' => $customer,
		);
		return $this->load->view('admin/customer', $data, FALSE);
	}

	public function exportExcel(){
		$this->load->model('admin/model_customer');
		$result = $this->model_customer->exportExcel();
		header("Content-Disposition: attachment; filename=\"khach_hang.xls\"");
		header("Pragma: no-cache");
		header("Expires: 0");
		header('Content-Type: text/html; charset=utf-8');
		$out = fopen("php://output", 'w');
		fputs($out, $bom = chr(0xEF) . chr(0xBB) . chr(0xBF) );
		foreach ($result as $data)
		{
		    fputcsv($out,$data,";");
		}
		fclose($out);  
	}

	public function searchCustomer(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/khach-hang/'));
		} 

		$hoTen = $this->input->post('tenKhachHang');
		$this->load->model('admin/model_customer');
		$result = $this->model_customer->searchInfoCustomer($hoTen);

		$data = json_encode($result);
		echo $data;
	}

	public function loadCustomer(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/khach-hang/'));
		}

		$start = $this->input->post('start');
		$this->load->model('admin/model_customer');
		$resultCheckCount = $this->model_customer->getAllCustomer(10000);
		if ($start <= count($resultCheckCount)){
			$result = $this->model_customer->getAllCustomer($start);
			$data = json_encode($result);
			echo $data;
		}else{
			$data = json_encode($resultCheckCount);
			echo $data;
		}
	}

	public function deleteCustomer(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/khach-hang/'));
		}

		$khachHangId = $this->input->post('khachHangId');
		$this->load->model('admin/model_customer');
		$result = $this->model_customer->deleteInfoCustomer($khachHangId);
		echo $result;
	}
}	

/* End of file adminCustomer.php */
/* Location: ./application/controllers/adminCustomer.php */
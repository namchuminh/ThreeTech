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

		$header = array('Mã Đơn Hàng', 'Tên Sản Phẩm', 'Số Lượng', 'Số Tiền', 'Thời Gian', 'Họ Tên', 'Số Điện Thoại', 'Địa Chỉ', 'Trạng Thái', 'Hoàn Tiền');

		fputcsv($out,$header,";");
		foreach ($result as $data)
		{
		    fputcsv($out,$data,";");
		}
		fclose($out);  
	}

}

/* End of file adminOrder.php */
/* Location: ./application/controllers/adminOrder.php */
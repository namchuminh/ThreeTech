<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
	}

	public function index()
	{
		$tieuDe = "ThreeTech - Trang quản trị Admin!";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');

		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/index', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		return redirect(base_url('admin/dang-nhap/'));
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
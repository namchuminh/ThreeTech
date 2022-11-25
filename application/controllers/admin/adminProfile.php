<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminProfile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
	}

	public function index()
	{
		$taikhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_profile');
		$this->load->model('admin/model_admin');
		$tieuDe = "ThreeTech - Thông Tin Admin";
		$taiKhoan = $this->session->userdata('taikhoan');
		$data = array(
			'profile' => $this->model_profile->getMyProfile($taikhoan),
			'myProduct' => $this->model_profile->getMyProduct($taikhoan),
			'myNews' => $this->model_profile->getMyNews($taikhoan),
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/profile', $data);
	}

}

/* End of file adminProfile.php */
/* Location: ./application/controllers/adminProfile.php */
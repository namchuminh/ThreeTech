<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminSetting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$tieuDe = "ThreeTech - Cài Đặt Thông Tin Admin";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$taikhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_setting');
		$data = array(
			'profile' => $this->model_setting->getProfileAdmin($taikhoan),
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/adminSetting', $data);
	}

	public function updateAdminProfile()
	{
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/cai-dat-ca-nhan/'));
		}
		$tieuDe = "ThreeTech - Thay Đổi Thông Tin Admin!";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$taikhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_setting');
		$nhanVienId = $this->model_setting->getProfileAdmin($taikhoan)[0]['nhanVienId'];
		$matKhau = $this->model_setting->getProfileAdmin($taikhoan)[0]['matKhau'];
		$avatar = $this->model_setting->getProfileAdmin($taikhoan)[0]['avatar'];
		$hoTen = $this->input->post('hoTen');
		$email = $this->input->post('email');
		$facebook = $this->input->post('facebook');
		$soDienThoai = $this->input->post('soDienThoai');

		$this->load->library('admin');
		if(!$this->admin->checkPassNullOrEmpty($matKhau)){
			$matKhau = md5($this->input->post('matKhau'));
		}
		

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('avatar')){
			$avatarUpdate = $this->upload->data();
			$avatar = base_url('uploads')."/".$avatarUpdate['file_name'];
		}

		$result = $this->model_setting->updateProfileAdmin($matKhau, $hoTen, $soDienThoai, $email, $facebook, $avatar, $taikhoan);
		if($result == True){
			$data = array(
				'mess' => 'Cập nhật thông tin thành công!',
				'profile' => $this->model_setting->getProfileAdmin($taikhoan),
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
			);
			return $this->load->view('admin/adminSetting', $data);
		}else{
			$data = array(
				'mess' => 'Cập nhật thông tin thất bại! Vui lòng kiểm tra lại!',
				'profile' => $this->model_setting->getProfileAdmin($taikhoan),
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
			);
			return $this->load->view('admin/adminSetting', $data);
		}

	}

}

/* End of file adminSetting.php */
/* Location: ./application/controllers/adminSetting.php */
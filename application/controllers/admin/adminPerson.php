<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminPerson extends CI_Controller {

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
		$this->load->model('admin/model_person');
		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'person' => $this->model_person->getAllInfoPerson(),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/person', $data);
	}

	public function updatePerson($nhanVienId){
		$tieuDe = "ThreeTech - Sửa Thông Tin Nhân Viên";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->load->model('admin/model_person');
		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'person' => $this->model_person->getInfoPersonById($nhanVienId),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/updatePerson', $data);
	}

	public function actionUpdatePerson(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/cai-dat-ca-nhan/'));
		}
		$tieuDe = "ThreeTech - Thay Đổi Thông Tin Nhân Viên!";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$taikhoan = $this->input->post('taiKhoan');
		$this->load->model('admin/model_person');
		$nhanVienId = $this->model_person->getInfoPersonUsername($taikhoan)[0]['nhanVienId'];
		$matKhau = $this->model_person->getInfoPersonUsername($taikhoan)[0]['matKhau'];
		$avatar = $this->model_person->getInfoPersonUsername($taikhoan)[0]['avatar'];
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

		$result = $this->model_person->updateInfoPerson($matKhau, $hoTen, $soDienThoai, $email, $facebook, $avatar, $taikhoan);
		if($result == True){
			$data = array(
				'mess' => 'Cập nhật thông tin nhân viên thành công!',
				'person' => $this->model_person->getInfoPersonUsername($taikhoan),
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
			);
			return $this->load->view('admin/updatePerson', $data);
		}else{
			$data = array(
				'mess' => 'Cập nhật thông tin nhân viên thất bại! Vui lòng kiểm tra lại!',
				'person' => $this->model_person->getInfoPersonUsername($taikhoan),
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
			);
			return $this->load->view('admin/updatePerson', $data);
		}
	}
}

/* End of file adminPerson.php */
/* Location: ./application/controllers/adminPerson.php */
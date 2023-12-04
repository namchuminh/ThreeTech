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

	public function actionLoadPerson()
	{
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/nhan-vien/'));
		}

		$start = $this->input->post('start');
		$this->load->model('admin/model_person');
		$resultCheckCount = $this->model_person->getAllInfoPerson(10000);
		if ($start <= count($resultCheckCount)){
			$result = $this->model_person->getAllInfoPerson($start);
			$data = json_encode($result);
			echo $data;
		}else{
			$data = json_encode($resultCheckCount);
			echo $data;
		}
		
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
		$chucVu = $this->input->post('chucVu');
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

		$result = $this->model_person->updateInfoPerson($matKhau, $hoTen, $chucVu, $soDienThoai, $email, $facebook, $avatar, $taikhoan);
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


	public function actionAddPerson(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/nhan-vien/'));
		}
		$tieuDe = "ThreeTech - Thêm Nhân Viên!";
		$this->load->model('admin/model_person');

		$taiKhoan = $this->input->post('taiKhoan');
		$matKhau = md5($this->input->post('matKhau'));
		$hoTen = $this->input->post('hoTen');
		$chucVu = $this->input->post('chucVu');
		$soDienThoai = $this->input->post('soDienThoai');
		$email = $this->input->post('email');
		$facebook = $this->input->post('facebook');
		$avatar = base_url("static/img/avatarPerson.png");

		$result = $this->model_person->getInfoPersonUsername($taiKhoan);
		if (count($result) >= 1){
			return redirect(base_url('admin/nhan-vien/'));
		}else{
			$this->model_person->insertInfoPerson($taiKhoan, $matKhau, $hoTen, $chucVu, $soDienThoai, $email, $facebook, $avatar);
			return redirect(base_url('admin/nhan-vien/'));
		}
	}

	public function actionDeletePerson(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/nhan-vien/'));
		}

		$nhanVienId = $this->input->post('nhanVienId');
		$this->load->model('admin/model_person');
		$result = $this->model_person->deleteInfoPerson($nhanVienId);
		echo $result;
	}

	public function actionSearchPerson(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/nhan-vien/'));
		} 

		$hoTen = $this->input->post('tenNhanVien');
		$this->load->model('admin/model_person');
		$result = $this->model_person->searchInfoPerson($hoTen);

		$data = json_encode($result);
		echo $data;
	}

	public function mark(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/nhan-vien/'));
		}

		$nhanVienId = $this->input->post('nhanVienId');
		$this->load->model('admin/model_person');
		$result = $this->model_person->checkMark($nhanVienId);
		if(count($result) == 0){
			$this->model_person->mark($nhanVienId);
			echo "Chấm công thành công!";
		}else{
			echo "Bạn đã chấm công cho hôm nay rồi!";
		}
	}	

	public function exportExcel(){
		$this->load->model('admin/model_person');
		$result = $this->model_person->exportExcel();
		header("Content-Disposition: attachment; filename=\"nhan_vien.xls\"");
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


	public function traLuong(){
		$this->load->model('admin/model_person');
		$this->load->model('admin/model_admin');
		$taiKhoan = $this->session->userdata('taikhoan');
		$tieuDe = "ThreeTech - Trả Lương Nhân Viên!";

		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
			'payWage' =>  $this->model_person->getPayWage(),
		);
		return $this->load->view('admin/payWage', $data, FALSE);
	}
}

/* End of file adminPerson.php */
/* Location: ./application/controllers/adminPerson.php */
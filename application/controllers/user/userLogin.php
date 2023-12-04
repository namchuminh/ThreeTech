<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userLogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')){
			return redirect(base_url());
		}
	}

	public function index()
	{
		return $this->load->view('user/userLogin');
	}

	public function actionLogin(){
		$taikhoan = $this->input->post('taikhoan');
		$matkhau = md5($this->input->post('matkhau'));
		if(empty($matkhau)){
			$data = array(
				'mess' => "Vui lòng nhập mật khẩu!",
			);
			return $this->load->view('user/userLogin', $data);
		}
		$this->load->library('user');
		if($this->user->checkUserpPass($taikhoan, $matkhau) == True){
			$this->load->model('user/model_login');
			$result = $this->model_login->checkUserLoginDB($taikhoan, $matkhau);
			if($result == 1){
				$newdata = array(
			        'khachhang'  => $taikhoan,
			        'logged_in' => TRUE,
			        'hoten' => $this->model_login->getInfo($taikhoan)[0]['hoTen'],
			        'sodienthoai' => $this->model_login->getInfo($taikhoan)[0]['soDienThoai'],
			        'diachi' => $this->model_login->getInfo($taikhoan)[0]['diaChi'],
				);
				$this->session->set_userdata($newdata);
				return redirect(base_url());
			}else{
				$data = array(
					'mess' => "Sai tài khoản hoặc mật khẩu!",
				);
				return $this->load->view('user/userLogin', $data);
			}
		}else{
			$data = array(
				'mess' => "Vui lòng nhập đúng định dạng!",
			);
			return $this->load->view('user/userLogin', $data);
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
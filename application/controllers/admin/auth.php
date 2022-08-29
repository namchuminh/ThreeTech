<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/'));
		}
	}

	public function index()
	{
		return $this->load->view('admin/login');
	}

	public function actionLogin(){
		$this->load->library('admin');
		if($this->admin->checkUserpPass($this->input->post('taikhoan'),$this->input->post('matkhau'))){
			$this->load->model('admin/model_auth');
			$taikhoan = $this->input->post('taikhoan');
			$matkhau = md5($this->input->post('matkhau'));
			$result = $this->model_auth->checkLoginDB($taikhoan,$matkhau);
			if($result == 1){
				$newdata = array(
				    'taikhoan'  => $this->input->post('taikhoan'),
				);
				$this->session->set_userdata($newdata);
				return redirect(base_url('admin/'));
			}else{
				$data = array(
					'error' => "Sai tài khoản hoặc mật khẩu! Vui lòng kiểm tra lại!"
				);
				return $this->load->view('admin/login', $data);
			}
		}else{
			$data = array(
				'error' => "Vui lòng nhập đúng định dạng tài khoản và mật khẩu!"
			);
			return $this->load->view('admin/login', $data);
		}
		
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
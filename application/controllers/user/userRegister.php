<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userRegister extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->has_userdata('logged_in')){
			return redirect(base_url());
		}
	}

	public function index()
	{
		return $this->load->view('user/userRegister');
	}
	public function actionRegister()
	{
		if(empty($_POST)||!isset($_POST)){
			return redirect(base_url('dang-ky/'));
		}
		$hoten = $this->input->post('hoten');
		$taikhoan = $this->input->post('taikhoan');
		$matkhau = md5($this->input->post('matkhau'));
		$matkhauthu = md5($this->input->post('matkhauthu'));
		$sodienthoai = $this->input->post('sodienthoai');
		$diachi = $this->input->post('diachi');
		$this->load->library('user');
		if($this->user->checkUserName($hoten) == True){
			if ($this->user->checkUserpPass($taikhoan, $matkhau) == True) {
				if($this->user->checkPass($matkhau, $matkhauthu)==True){
					$this->load->model('user/model_login');
					$result = $this->model_login->checkUserName($taikhoan);
					if($result==0){
						if($this->user->checkSdt($sodienthoai)==True){
							$this->load->model('user/model_addUser');
							$result = $this->model_addUser->insertUser($taikhoan, $matkhau, $hoten, $sodienthoai, $diachi);
							if($result==True){
								// $data = array(
								// 	'messthanhcong' => "Đăng ký Thành Công Hãy Đăng Nhập Lại!",
								// );
								// $this->load->view('user/userRegister', $data);

								echo "<script type='text/javascript'>alert('Đang ký thành công hãy đăng nhập lại');</script>";
								//


								$this->load->view('user/userLogin');
								//redirect(base_url('/dang-nhap'));

							}else{
								$data = array(
									'messtb' => "Đăng ký thất bại!",
								);
								return $this->load->view('user/userRegister', $data);
							}
							
						}else{

							$data = array(
								'messsdt' => "Vui lòng nhập lại số điện thoại!",
							);
							return $this->load->view('user/userRegister', $data);
						}
					}else{
						$data = array(
							'messtt' => "Tài khoản đã tồn tại! hãy thử ".$taikhoan."123",
						);
						return $this->load->view('user/userRegister', $data);
					}
					
				}else{

					$data = array(
						'messmk' => "Mật khẩu và mật khẩu xác nhận không khớp!",
					);
					return $this->load->view('user/userRegister', $data);
				}
			}else{

				$data = array(
					'messtk' => "Vui lòng nhập lại tài khoản mật khẩu!",
				);
				return $this->load->view('user/userRegister', $data);
			}
		}
		else{

			$data = array(
				'messht' => "Vui lòng nhập lại họ và tên!",
			);
			return $this->load->view('user/userRegister', $data);
		}
	}
}

/* End of file user_Register.php */
/* Location: ./application/controllers/user_Register.php */
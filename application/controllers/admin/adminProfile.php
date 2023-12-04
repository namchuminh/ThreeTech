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
			'checkNumberProduct' => $this->model_profile->checkNumberProduct($taikhoan),
			'checkNumberNews' => $this->model_profile->checkNumberNews($taikhoan),
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/profile', $data);
	}

	public function actionLoadProductOrNews()
	{
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/ca-nhan/'));
		}

		$taikhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_profile');
		if(isset($_POST['numberProduct']) && !empty($_POST['numberProduct'])){
			$numberProduct = $this->input->post('numberProduct');
			$result = $this->model_profile->getMyProduct($taikhoan, $numberProduct);
			$data = json_encode($result);
			echo $data;
		}
		
		if(isset($_POST['tenSanPham'])){
			$tenSanPham = $this->input->post('tenSanPham');
			$result = $this->model_profile->searchMyProduct($taikhoan, $tenSanPham);
			$data = json_encode($result);
			echo $data;
		}
		
		// if ($selection == "product"){
			
		// }else if($selection == "news"){
		// 	$result = $this->model_profile->getMyNews($taikhoan);
		// 	$data = json_encode($result);
		// 	echo $data;
		// }

		
	}

	public function actionDeleteMyProduct($sanPhamId){
		$this->load->model('admin/model_product');
		$this->model_product->deleteProduct($sanPhamId);
		return redirect(base_url('admin/ca-nhan/'));
	}

}

/* End of file adminProfile.php */
/* Location: ./application/controllers/adminProfile.php */
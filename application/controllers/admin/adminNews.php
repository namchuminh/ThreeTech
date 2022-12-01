<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminNews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
	}

	public function index()
	{
		$tieuDe = "ThreeTech - Quản Lý Tin Tức";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->session->set_userdata('referred_from', current_url());
		$this->load->model('admin/model_product');
		$this->load->model('admin/model_news');

		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
			'news' => $this->model_news->getNews(),
		);
		return $this->load->view('admin/news', $data);
	}

	public function addNews(){
		$tieuDe = "ThreeTech - Tạo Tin Tức Mới";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->session->set_userdata('referred_from', current_url());
		$this->load->model('admin/model_product');
		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return $this->load->view('admin/addNews', $data);
	}

	public function actionAddNews(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/tin-tuc/'));
		}

		$tieuDe = $this->input->post('tieuDe');
		$duongDan = $this->input->post('duongDan');
		$noiDung = $this->input->post('noiDung');
		$anhChinh = "";

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('anhChinh')){
			$imageChinh = $this->upload->data();
			$anhChinh = base_url('uploads').'/'.$imageChinh['file_name'];
		}

		$this->load->model('admin/model_news');
		$result = $this->model_news->addNews($tieuDe, $duongDan, $noiDung, $anhChinh);

		$tieuDe = "ThreeTech - Quản Lý Tin Tức";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->session->set_userdata('referred_from', current_url());
		$this->load->model('admin/model_product');
		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
		);
		return redirect(base_url('admin/tin-tuc/'));
	}
}

/* End of file adminNews.php */
/* Location: ./application/controllers/adminNews.php */
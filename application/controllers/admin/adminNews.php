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

		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$nhanVien = $this->model_admin->getUserLogin($taiKhoan);
		$nhanVienId = $nhanVien[0]['nhanVienId'];

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
		$result = $this->model_news->addNews($tieuDe, $duongDan, $noiDung, $nhanVienId, $anhChinh);

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

	public function actionDeleteNews($tinTucId){
		$this->load->model('admin/model_news');
		$result = $this->model_news->deleteNews($tinTucId);
		return redirect(base_url('admin/tin-tuc/'));
	}

	public function actionUpdateNews($tinTucId){

		if(!empty($_POST) && isset($_POST)){
			$taiKhoan = $this->session->userdata('taikhoan');
			$this->load->model('admin/model_admin');
			$nhanVien = $this->model_admin->getUserLogin($taiKhoan);
			$nhanVienId = $nhanVien[0]['nhanVienId'];
			$this->load->model('admin/model_news');
			$news = $this->model_news->getNewsById($tinTucId);

			$tieuDe = $this->input->post('tieuDe');
			$duongDan = $this->input->post('duongDan');
			$noiDung = $this->input->post('noiDung');
			$anhChinh = $news[0]["anhChinh"];

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('anhChinh')){
				$imageChinh = $this->upload->data();
				$anhChinh = base_url('uploads').'/'.$imageChinh['file_name'];
			}

			$result = $this->model_news->updateNews($anhChinh, $tieuDe, $noiDung, $nhanVienId, $duongDan, $tinTucId);
			
			$tieuDe = "ThreeTech - Sửa Tin Tức Mới";
			$news = $this->model_news->getNewsById($tinTucId);
			$data = array(
				'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
				'tieuDe' => $tieuDe,
				'news' => $news,
			);
			return $this->load->view('admin/updateNews', $data);
		}


		$tieuDe = "ThreeTech - Sửa Tin Tức Mới";
		$taiKhoan = $this->session->userdata('taikhoan');
		$this->load->model('admin/model_admin');
		$this->session->set_userdata('referred_from', current_url());
		$this->load->model('admin/model_news');
		$news = $this->model_news->getNewsById($tinTucId);
		$data = array(
			'adminLogin' => $this->model_admin->getUserLogin($taiKhoan),
			'tieuDe' => $tieuDe,
			'news' => $news,
		);
		return $this->load->view('admin/updateNews', $data);
	}


	public function searchNews(){
		if(empty($_POST) || !isset($_POST)){
			return redirect(base_url('admin/tin-tuc/'));
		}

		$tieuDe = $this->input->post('tieuDe');
		$this->load->model('admin/model_news');
		$result = $this->model_news->searchNews($tieuDe);

		$data = json_encode($result);
		echo $data;
	}
}

/* End of file adminNews.php */
/* Location: ./application/controllers/adminNews.php */
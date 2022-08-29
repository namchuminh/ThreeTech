<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('taikhoan')){
			return redirect(base_url('admin/dang-nhap/'));
		}
	}

	public function index()
	{
		return $this->load->view('admin/index');
	}

	public function logout(){
		$this->session->sess_destroy();
		return redirect(base_url('admin/dang-nhap/'));
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
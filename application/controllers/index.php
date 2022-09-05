<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in
			);
			return $this->load->view('view_index', $data);
		}else{
			return $this->load->view('view_index');
		}
		
	}
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
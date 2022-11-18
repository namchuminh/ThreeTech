<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$tenSanPham = $this->input->get('sanpham');
		$tenChuyenMuc = $this->input->get('chuyenmuc');
		$this->load->model('product/model_search');
		$result = $this->model_search->search($tenSanPham,$tenChuyenMuc); 
		$data = array(
			'product' => $result,
			'productName' => $tenSanPham,
		);
		return $this->load->view('product/productSearch', $data, FALSE);
	}

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function detail($duongDan)
	{
		$this->load->model('product/model_product');
		$chiTietSanPham = $this->model_product->getDetailProduct($duongDan);
		$data = array(
			'chiTietSanPham' => $chiTietSanPham,
		);
		return $this->load->view('product/productDetail', $data);
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */
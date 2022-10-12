<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($duongDanChuyenMuc)
	{
		$this->load->model('product/model_category');

		$this->model_category->getProductBySlug($duongDanChuyenMuc);

		$product = $this->model_category->getProductBySlug($duongDanChuyenMuc);
		$categoryName = $this->model_category->getCategoryName($duongDanChuyenMuc);

		$data = array(
			'product' => $product,
			'categoryName' => $categoryName,
		);

		return $this->load->view('product/productCategory', $data);
	}

}

/* End of file category.php */
/* Location: ./application/controllers/category.php */
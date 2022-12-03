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
		$chuyenMuc = $this->model_product->getCateByUrl($duongDan);
		$sanPhamLienQuan = $this->model_product->getProductRelated($duongDan);
		$sanphamtuongtu = $this->model_product->getProductTuongTu($duongDan);
		$data = array(
			'chiTietSanPham' => $chiTietSanPham,
			'chuyenMuc' => $chuyenMuc,
			'sanPhamLienQuan' => $sanPhamLienQuan,
			'sanphamtuongtu' => $sanphamtuongtu,
		);
		// echo '<pre>';
		// 	var_dump($chiTietSanPham);
		// echo '</pre>';

		return $this->load->view('product/productDetail', $data);
	}

	public function search(){
		$tenSanPhamCanTim = $this->input->get('product');

		$this->load->model('product/model_product');

		$product = $this->model_product->search($tenSanPhamCanTim);

		$this->load->model('model_index');
		$cothebanquantam = $this->model_index->getProductQuanTam();


		$data = array(
			'product' => $product,
			'cothebanquantam' => $cothebanquantam,
			'tenSanPhamCanTim' => $tenSanPhamCanTim,
		);

		return $this->load->view('product/search', $data, FALSE);
	}

	public function addToCart(){
		$sanPhamId = $this->input->post('sanPhamId');
		if(isset($_POST) && !empty($sanPhamId)){
			if($this->session->has_userdata('khachhang')){

				$this->load->model('product/model_product');
				$this->load->model('model_index');

				$khachhang = $this->session->userdata('khachhang');
				$kh = $this->model_index->getCustomerLogin($khachhang);
				$khachHangId = $kh[0]['khachHangId'];

				$checkProductInCart = $this->model_product->checkProductInCart($sanPhamId, $khachHangId);

				if(count($checkProductInCart) >= 1){
					$soLuong = $checkProductInCart[0]['soLuong'] + 1;
					$result = $this->model_product->updateProductInCart($sanPhamId, $khachHangId, $soLuong);
					if($result == True){
						echo "Đã cập nhật sản phẩm vào giỏ hàng!";
					}else{
						echo "Cập nhật sản phẩm vào giỏ hàng không thành công!";
					}
				}else{
					$result = $this->model_product->addToCart($sanPhamId, $khachHangId);
					if($result == True){
						echo "Đã thêm sản phẩm vào giỏ hàng!";
					}else{
						echo "Thêm sản phẩm không thành công!";
					}
				}
			}else{
				echo "chuaDangNhap";
			}
		}else{
			return redirect(base_url());
		}
		

	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */
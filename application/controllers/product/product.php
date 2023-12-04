<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/model_admin');
	}

	public function detail($duongDan)
	{
		$this->load->model('product/model_product');
		$this->load->model('model_index');
		$this->load->model('cart/model_addToCart');

		if(count($this->model_product->getDetailProduct($duongDan)) <= 0 && $this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'soLuongSanPham' => $soLuongSanPham,
				'cart_price' => $cart_price,
			);
			return $this->load->view('view_404', $data);
		}

		if(count($this->model_product->getDetailProduct($duongDan)) <= 0 && !$this->session->has_userdata('khachhang')){
			return $this->load->view('view_404');
		}


		
		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$chiTietSanPham = $this->model_product->getDetailProduct($duongDan);
			$chuyenMuc = $this->model_product->getCateByUrl($duongDan);
			$sanPhamLienQuan = $this->model_product->getProductRelated($duongDan);
			$sanphamtuongtu = $this->model_product->getProductTuongTu($duongDan);
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'chiTietSanPham' => $chiTietSanPham,
				'chuyenMuc' => $chuyenMuc,
				'sanPhamLienQuan' => $sanPhamLienQuan,
				'sanphamtuongtu' => $sanphamtuongtu,
				'soluongsanpham' => $soLuongSanPham,
				'cart_price' => $cart_price,
			);
			return $this->load->view('product/productDetail', $data);
		}else{
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
			return $this->load->view('product/productDetail', $data);
		}
	}

	public function noiBatMoi(){
		$this->load->model('model_index');
		$this->load->model('cart/model_addToCart');
		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$this->load->model('product/model_product');
			$noibatmoi = $this->model_product->getProductNoiBatMoi();
			$sanphamtuongtu = $this->model_product->getProductTuongTu();
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'noibatmoi' => $noibatmoi,
				'sanphamtuongtu' => $sanphamtuongtu,
				'cart_price' => $cart_price,
				'soluongsanpham' => $soLuongSanPham,
			);
			return $this->load->view('product/noibatmoi', $data);
		}else{
			$this->load->model('product/model_product');
			$noibatmoi = $this->model_product->getProductNoiBatMoi();
			$sanphamtuongtu = $this->model_product->getProductTuongTu();
			$data = array(
				'noibatmoi' => $noibatmoi,
				'sanphamtuongtu' => $sanphamtuongtu,
				
			);
			return $this->load->view('product/noibatmoi', $data);
		}
		
	}

	public function audioVideo(){
			$this->load->model('model_index');
			$this->load->model('cart/model_addToCart');
			if($this->session->has_userdata('khachhang')){
				$khachhang = $this->session->userdata('khachhang');
				$logged_in = $this->session->userdata('logged_in');
				$kh = $this->model_index->getCustomerLogin($khachhang);
				$khachHangId = $kh[0]['khachHangId'];
				$soLuongSanPham = $this->model_index->countProduct($khachHangId);
				$cart_price = $this->model_addToCart->cart_price($khachHangId);
				$this->load->model('product/model_product');
				$audiovideo = $this->model_product->getProductAudioVideo();
				$sanphamtuongtu = $this->model_product->getProductTuongTu();
				$data = array(
					'khachhang' => $khachhang,
					'logged_in' => $logged_in,
					'audiovideo' => $audiovideo,
					'sanphamtuongtu' => $sanphamtuongtu,
					'cart_price' => $cart_price,
					'soluongsanpham' => $soLuongSanPham,
				);
				return $this->load->view('product/audiovideo', $data);
			}else{

				$this->load->model('product/model_product');
				$audiovideo = $this->model_product->getProductAudioVideo();
				$sanphamtuongtu = $this->model_product->getProductTuongTu();
				$data = array(
					'audiovideo' => $audiovideo,
					'sanphamtuongtu' => $sanphamtuongtu,
					
				);
				return $this->load->view('product/audiovideo', $data);
		}
	}

	public function mayTinhLaptop(){

		$this->load->model('model_index');
		$this->load->model('cart/model_addToCart');
		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$this->load->model('product/model_product');
			$maytinhlaptop = $this->model_product->getProductMayTinhLaptop();
			$sanphamtuongtu = $this->model_product->getProductTuongTu();
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'maytinhlaptop' => $maytinhlaptop,
				'sanphamtuongtu' => $sanphamtuongtu,
				'cart_price' => $cart_price,
				'soluongsanpham' => $soLuongSanPham,
			);
			return $this->load->view('product/maytinhlaptop', $data);
		}else{
			$this->load->model('product/model_product');
			$maytinhlaptop = $this->model_product->getProductMayTinhLaptop();
			$sanphamtuongtu = $this->model_product->getProductTuongTu();
			$data = array(
				'maytinhlaptop' => $maytinhlaptop,
				'sanphamtuongtu' => $sanphamtuongtu,
					
			);
			return $this->load->view('product/maytinhlaptop', $data);
		}
	}

	public function top20(){

		$this->load->model('model_index');
		$this->load->model('cart/model_addToCart');
		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$this->load->model('product/model_product');
			$top20 = $this->model_product->getProductTop20();
			$sanphamtuongtu = $this->model_product->getProductTuongTu();
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'top20' => $top20,
				'sanphamtuongtu' => $sanphamtuongtu,
				'cart_price' => $cart_price,
				'soluongsanpham' => $soLuongSanPham,
			);
			return $this->load->view('product/top20', $data);
		}else{
			$this->load->model('product/model_product');
			$top20 = $this->model_product->getProductTop20();
			$sanphamtuongtu = $this->model_product->getProductTuongTu();
			$data = array(
				'top20' => $top20,
				'sanphamtuongtu' => $sanphamtuongtu,
				
			);
			return $this->load->view('product/top20', $data);
		}
	}

	public function trend(){

		$this->load->model('model_index');
		$this->load->model('cart/model_addToCart');
		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$this->load->model('product/model_product');
			$trend = $this->model_product->getProductTrend();
			$sanphamtuongtu = $this->model_product->getProductTuongTu();
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'trend' => $trend,
				'sanphamtuongtu' => $sanphamtuongtu,
				'cart_price' => $cart_price,
				'soluongsanpham' => $soLuongSanPham,
			);
			return $this->load->view('product/trend', $data);
		}else{
			$this->load->model('product/model_product');
			$trend = $this->model_product->getProductTrend();
			$sanphamtuongtu = $this->model_product->getProductTuongTu();
			$data = array(
				'trend' => $trend,
				'sanphamtuongtu' => $sanphamtuongtu,
				
			);
			return $this->load->view('product/trend', $data);
		}
	}

	public function search(){
		$tenSanPhamCanTim = $this->input->get('product');
		$this->load->model('model_index');
		$this->load->model('product/model_product');
		$this->load->model('cart/model_addToCart');

		$product = $this->model_product->search($tenSanPhamCanTim);
		
		
		$cothebanquantam = $this->model_index->getProductQuanTam();

		if($this->session->has_userdata('khachhang')){
			$khachhang = $this->session->userdata('khachhang');
			$logged_in = $this->session->userdata('logged_in');
			$kh = $this->model_index->getCustomerLogin($khachhang);
			$khachHangId = $kh[0]['khachHangId'];
			$soLuongSanPham = $this->model_index->countProduct($khachHangId);
			$cart_price = $this->model_addToCart->cart_price($khachHangId);
			$data = array(
				'khachhang' => $khachhang,
				'logged_in' => $logged_in,
				'soluongsanpham' => $soLuongSanPham,
				'product' => $product,
				'cothebanquantam' => $cothebanquantam,
				'tenSanPhamCanTim' => $tenSanPhamCanTim,
				'cart_price' => $cart_price,
			);

			return $this->load->view('product/search', $data, FALSE);
		}else{
			$data = array(
				'product' => $product,
				'cothebanquantam' => $cothebanquantam,
				'tenSanPhamCanTim' => $tenSanPhamCanTim,
			);

			return $this->load->view('product/search', $data, FALSE);
		}

		
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
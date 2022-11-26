<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_vnpay extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function add($khachHangId, $madonhang, $sotien, $noidung, $nganhang, $thoigian, $magiaodich){
		$sql = "INSERT INTO vnpay(khachHangId, madonhang, sotien, noidung, nganhang, thoigian, magiaodich) VALUES (?,?,?,?,?,?,?)";
		$result = $this->db->query($sql,array($khachHangId, $madonhang, $sotien, $noidung, $nganhang, $thoigian, $magiaodich));
		return $result;
	}
}

/* End of file model_product.php */
/* Location: ./application/models/model_product.php */
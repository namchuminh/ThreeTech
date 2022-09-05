<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_index extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getCustomerLogin($taikhoan)
	{
		// code...
		$sql = "SELECT * FROM khachhang WHERE taiKhoan=?";
		$result = $this->db->query($sql, array($taikhoan));
		return $result->result_array();
	}

}

/* End of file model_index.php */
/* Location: ./application/models/model_index.php */
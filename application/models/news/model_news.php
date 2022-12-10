<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_news extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function checkNumberTinTuc($duongDan){
		$sql = "SELECT * FROM tintuc WHERE duongDan = ?";
		$result = $this->db->query($sql, array($duongDan));
		return $result->result_array();
	}

	public function getTinTucByDuongDan($duongDan){
		$sql = "SELECT * FROM tintuc WHERE duongDan = ?";
		$result = $this->db->query($sql, array($duongDan));
		return $result->result_array();
	}
	public function getTinTucLienQuan(){
		$sql = "SELECT * FROM tintuc ORDER BY RAND() DESC LIMIT 10";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

/* End of file model_news.php */
/* Location: ./application/models/model_news.php */
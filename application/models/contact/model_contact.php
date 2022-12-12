<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_contact extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function addContact($hoTen, $email, $soDienThoai, $tinNhan){
		$sql = "INSERT INTO lienhe (hoTen, email, soDienThoai, tinNhan) VALUES (?, ?, ?, ?)";
		$result = $this->db->query($sql, array($hoTen, $email, $soDienThoai, $tinNhan));
		return $result;
	}

}

/* End of file model_contact.php */
/* Location: ./application/models/model_contact.php */
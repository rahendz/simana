<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mengajar_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function get(){
		$this->db->select('*');
		$this->db->from('mengajar');
		return $this->db->get();
	}

}

/* End of file mengajar_model.php */
/* Location: ./application/models/mengajar_model.php */
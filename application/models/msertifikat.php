<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msertifikat extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get()
	{
		return $this->db->get ( 'sertifikat_tot' );
	}
}

/* End of file msertifikat.php */
/* Location: ./application/models/msertifikat.php */
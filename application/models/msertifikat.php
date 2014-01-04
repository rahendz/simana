<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msertifikat extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get()
	{
		$this->db->select ( '*, tot.nama as tot, narasumber_biodata.nama as nama' );

		$this->db->join ( 'narasumber_biodata', 'narasumber_biodata.idnarasumber_biodata = sertifikat_tot.narasumber_biodata_idnarasumber_biodata' );

		$this->db->join ( 'tot', 'tot.idtot = sertifikat_tot.tot_idtot' );

		$this->db->order_by ( 'narasumber_biodata.idnarasumber_biodata', 'asc' );

		return $this->db->get ( 'sertifikat_tot' );
	}
}

/* End of file msertifikat.php */
/* Location: ./application/models/msertifikat.php */
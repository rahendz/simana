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

	public function add()
	{
		$data = (object) $this->input->post ( NULL, TRUE );

		$this->db->set ( 'narasumber_biodata_idnarasumber_biodata', $data->idnarasumber );

		$this->db->set ( 'nomor', $data->nomor );

		$this->db->set ( 'nilai', str_replace ( ',', '.', $data->nilai ) );

		$this->db->set ( 'tot_idtot', $data->idtot );

		if ( $this->db->insert ( 'sertifikat_tot' ) !== FALSE )

			return TRUE;

		return FALSE;
	}

	public function delete ( $sid )
	{
		$this->db->where ( 'idsertifikat_tot', $sid );

		return $this->db->delete ( 'sertifikat_tot' );
	}

	public function edit ( $sid )
	{
		$update = (object) $this->input->post ( NULL, TRUE );

		$this->db->set ( 'nomor', $update->nomor );

		$this->db->set ( 'nilai', str_replace ( ',', '.', $update->nilai ) );

		$this->db->set ( 'tot_idtot', $update->idtot );

		$this->db->where ( 'idsertifikat_tot', $sid );

		if ( $this->db->update ( 'sertifikat_tot' ) !== FALSE )

			return TRUE;

		return FALSE;
	}

	public function getById ( $sid )
	{
		$result = $this->db->get_where ( 'sertifikat_tot', array ( 'idsertifikat_tot' => $sid ) );

		return $result->num_rows() > 0 ? $result->row_array() : array (

			"idsertifikat_tot" => "", "narasumber_biodata_idnarasumber_biodata" => "", "nomor" => "", "nilai" => "", "tot_idtot" => "" 

			);
	}
}

/* End of file msertifikat.php */
/* Location: ./application/models/msertifikat.php */
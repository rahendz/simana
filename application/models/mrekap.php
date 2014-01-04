<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrekap extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function bulanan()
	{
		$idnarasumber = $this->input->post('idnarasumber');
		$tahun		  = $this->input->post('tahun');
		$bulan        = $this->input->post('bulan');

		$query = $this->db->query("SELECT  nama, sum(jumlah) as jumlah_ngajar 
									FROM mengajar , narasumber_biodata
									WHERE narasumber_biodata_idnarasumber_biodata = idnarasumber_biodata and Year(tanggal) = ".$tahun." and Month(tanggal) = ".$bulan." and narasumber_biodata_idnarasumber_biodata = ". $idnarasumber.
									" GROUP BY narasumber_biodata_idnarasumber_biodata");

		return $query->result();
		
	}

	public function tahunan()
	{
		$idnarasumber = $this->input->post('idnarasumber');
		$tahun		  = $this->input->post('tahun');

		$query = $this->db->query("SELECT  nama, sum(jumlah) as jumlah_ngajar 
									FROM mengajar , narasumber_biodata
									WHERE narasumber_biodata_idnarasumber_biodata = idnarasumber_biodata and Year(tanggal) = ".$tahun." and narasumber_biodata_idnarasumber_biodata = ". $idnarasumber.
									" GROUP BY narasumber_biodata_idnarasumber_biodata");

		return $query->result();
		
	}

}

/* End of file mrekap.php */
/* Location: ./application/models/mrekap.php */
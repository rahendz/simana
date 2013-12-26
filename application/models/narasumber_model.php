<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narasumber_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

/*<<<<<<< HEAD
	public function getAllNarasumber(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('narasumber_biodata');
=======*/
	public function get()
	{
		$this->db->select ( '*' );
		
		$this->db->from ( 'narasumber_biodata' );
		
/*>>>>>>> origin/rahendz*/
		return $this->db->get();
	}

	public function getById ( $id )
	{
		$this->db->select ( '*' );

		$this->db->from ( 'narasumber_biodata' );

		$this->db->where ( 'idnarasumber_biodata', $id );

		$result = $this->db->get();

		return $result->num_rows() > 0 ? $result->row_array() : array ( 

			'nama'=>'', 'instansi'=>'', 'lokasi'=>'', 'telp'=>'', 'email'=>'' );
	}

	public function add ( $data )
	{
		$this->load->library('session');

		$this->db->set ( 'nama', $data['nama'] );

		$this->db->set ( 'instansi', $data['instansi'] );

		$this->db->set ( 'lokasi', $data['lokasi'] );

		$this->db->set ( 'telp', $data['telp'] );

		$this->db->set ( 'email', $data['email'] );

		if ($this->db->insert ( 'narasumber_biodata' )) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Data Berhasil Disimpan</div>');
			return TRUE;
		}else{
			$this->session->set_flashdata('notif','<div class="alert alert-danger">Data Gagal Disimpan</div>');
			return FALSE;
		}

		
	}

	public function edit ( $data, $id )
	{
		$this->db->set ( 'nama', $data['nama'] );

		$this->db->set ( 'instansi', $data['instansi'] );

		$this->db->set ( 'lokasi', $data['lokasi'] );

		$this->db->set ( 'telp', $data['telp'] );

		$this->db->set ( 'email', $data['email'] );

		$this->db->where ( 'idnarasumber_biodata', $id );

		if ($this->db->update ( 'narasumber_biodata' )) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Data Berhasil Di Edit</div>');
			return TRUE;
		}else{
			$this->session->set_flashdata('notif','<div class="alert alert-danger">Data Gagal Di Edit</div>');
			return FALSE;
		}

	}

	public function delete ( $id )
	{
		$this->db->where ( 'idnarasumber_biodata', $id );
		
		if ($this->db->delete ( 'narasumber_biodata' )) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Data Berhasil Di Hapus</div>');
			return TRUE;
		}else{
			$this->session->set_flashdata('notif','<div class="alert alert-danger">Data Gagal Di Hapus</div>');
			return FALSE;
		}
	}
}
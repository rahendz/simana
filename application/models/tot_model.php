<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tot_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get()
	{
		$this->db->select ( '*' );
		
		$this->db->from ( 'tot' );
		
		return $this->db->get();
	}

	public function getById ( $id )
	{
		$this->db->select ( '*' );

		$this->db->from ( 'tot' );
		
		$this->db->where ( 'idtot', $id );

		$result = $this->db->get();
		
		return $result->num_rows() > 0 ? $result->row_array() : array ( 'nama' => '' );
	}

	public function add ( $data )
	{
		$this->db->set ( 'nama', $data['nama'] );

		if ($this->db->insert ( 'tot' )) {
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
		
		$this->db->where ( 'idtot', $id );
		
		if ($this->db->update ( 'tot' )) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Data Berhasil Di Edit</div>');
			return TRUE;
		}else{
			$this->session->set_flashdata('notif','<div class="alert alert-danger">Data Gagal Di Edit</div>');
			return FALSE;
		}
	}

	public function delete ( $id )
	{
		$this->db->where ( 'idtot', $id );
		
		if ($this->db->delete ( 'tot' )) {
			$this->session->set_flashdata('notif','<div class="alert alert-success">Data Berhasil Di Hapus</div>');
			return TRUE;
		}else{
			$this->session->set_flashdata('notif','<div class="alert alert-danger">Data Gagal Di Hapus</div>');
			return FALSE;
		}
	}
}
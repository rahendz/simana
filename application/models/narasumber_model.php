<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narasumber_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

<<<<<<< HEAD
	public function getAllNarasumber(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('narasumber_biodata');
=======
	public function get()
	{
		$this->db->select ( '*' );
		
		$this->db->from ( 'narasumber_biodata' );
		
>>>>>>> origin/rahendz
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
		$this->db->set ( 'nama', $data['nama'] );

		$this->db->set ( 'instansi', $data['instansi'] );

		$this->db->set ( 'lokasi', $data['lokasi'] );

		$this->db->set ( 'telp', $data['telp'] );

		$this->db->set ( 'email', $data['email'] );

		$this->db->insert ( 'narasumber_biodata' );
	}

	public function edit ( $data, $id )
	{
		$this->db->set ( 'nama', $data['nama'] );

		$this->db->set ( 'instansi', $data['instansi'] );

		$this->db->set ( 'lokasi', $data['lokasi'] );

		$this->db->set ( 'telp', $data['telp'] );

		$this->db->set ( 'email', $data['email'] );

		$this->db->where ( 'idnarasumber_biodata', $id );

		$this->db->update ( 'narasumber_biodata' );
	}

	public function delete ( $id )
	{
		$this->db->where ( 'idnarasumber_biodata', $id );
		
		$this->db->delete ( 'narasumber_biodata' );
	}
}
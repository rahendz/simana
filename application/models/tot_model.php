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

		$this->db->insert ( 'tot' );
	}

	public function edit ( $data, $id )
	{
		$this->db->set ( 'nama', $data['nama'] );
		
		$this->db->where ( 'idtot', $id );
		
		$this->db->update ( 'tot' );
	}

	public function delete ( $id )
	{
		$this->db->where ( 'idtot', $id );
		
		$this->db->delete ( 'tot' );
	}
}
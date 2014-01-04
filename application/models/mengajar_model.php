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

	public function add()
	{
		$this->load->model ( 'narasumber_model' );

		$data = (object) $this->input->post ( NULL, TRUE );

		$this->db->set( 'tempat', $data->tempat );

		$this->db->set( 'jumlah', $data->jumlah );

		$this->db->set( 'tanggal', date ( "Y-m-d", strtotime ( $data->tanggal ) ) );

		$this->db->set( 'catatan', $data->catatan );

		$this->db->set( 'narasumber_biodata_idnarasumber_biodata', $data->idnarasumber );

		if ( $this->db->insert ( 'mengajar' ) === FALSE ) return FALSE;

		$mid = $this->db->insert_id();

		$ndata = (object) $this->narasumber_model->getById ( $data->idnarasumber );

		$mnama = str_replace ( ' ', '_', strtolower ( trim ( $ndata->nama ) ) );

		$mtgl = strtotime ( $data->tanggal );

		$init['upload_path'] 	= './uploads/surat-penugasan/';
		$init['allowed_types'] 	= 'gif|jpg|png';
		$init['max_size'] 		= '1000';
		$init['overwrite'] 		= TRUE;
		$init['file_name'] 		= 'sp-' . $mid . '-' . $mnama . '-' . $mtgl . '-' . $data->idnarasumber . '.jpg';

		$this->load->library ( 'upload', $init );

		$file = (object) $this->upload->data();

		$this->db->set( 'surat_penugasan', $file->file_name );

		$this->db->where ( 'idmengajar', $mid );

		if ( $this->db->update ( 'mengajar' ) === FALSE ) return FALSE;

		return $this->upload->do_upload() ? TRUE : FALSE;
	}

}

/* End of file mengajar_model.php */
/* Location: ./application/models/mengajar_model.php */
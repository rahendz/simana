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

	public function add ( $data )
	{
		$init['upload_path'] 	= './uploads/';
		$init['allowed_types'] 	= 'gif|jpg|png';
		$init['max_size'] 		= '100000';
		$init['overwrite'] 		= TRUE;
		$init['file_name'] 		= 'mengajar-' . $data["idnarasumber"];

		$this->load->library('upload',$init);

		if ( $this->upload->do_upload() )

			return $this->upload->data();

		else

			return $data;
	}

}

/* End of file mengajar_model.php */
/* Location: ./application/models/mengajar_model.php */
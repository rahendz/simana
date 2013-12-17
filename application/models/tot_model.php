<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tot_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getAllTot(){
		$this->db->select('*');
		$this->db->from('tot');
		return $this->db->get();
	}

	public function getTotById($id){
		$this->db->select('*');
		$this->db->from('tot');
		$this->db->where('idtot',$id);
		return $this->db->get()->row();
	}

	public function addTot($data,$id=""){
		
		if ($id == "") {
			//print_r($data);exit();
			$this->db->set('nama',$data['nama']);
			$this->db->insert('tot');
		} else {
			//echo "no";exit();
			$this->db->set('nama',$data['nama']);
			$this->db->where('idtot',$id);
			$this->db->update('tot');
		}
	}

	public function deleteTotById($id){
		$this->db->where('idtot',$id);
		$this->db->delete('tot');
	}
}
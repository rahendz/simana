<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narasumber_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function getAllNarasumber(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('narasumber_biodata');
		return $this->db->get();
	}

	public function addNarasumber($data,$id=""){
		
		if ($id == "") {
			//print_r($data);exit();
			$this->db->set('nama',$data['nama']);
			$this->db->set('instansi',$data['instansi']);
			$this->db->set('lokasi',$data['lokasi']);
			$this->db->set('telp',$data['telp']);
			$this->db->set('email',$data['email']);
			$this->db->insert('narasumber_biodata');
		} else {
			//echo "no";exit();
			$this->db->set('nama',$data['nama']);
			$this->db->set('instansi',$data['instansi']);
			$this->db->set('lokasi',$data['lokasi']);
			$this->db->set('telp',$data['telp']);
			$this->db->set('email',$data['email']);
			$this->db->where('idnarasumber_biodata',$id);
			$this->db->update('narasumber_biodata');
		}
	}

	public function getNarasumberId($id){
		$this->db->select('*');
		$this->db->from('narasumber_biodata');
		$this->db->where('idnarasumber_biodata',$id);
		return $this->db->get()->row();
	}

	public function deleteNarasumberById($id){
		$this->db->where('idnarasumber_biodata',$id);
		$this->db->delete('narasumber_biodata');
	}
}
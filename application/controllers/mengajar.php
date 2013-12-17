<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mengajar extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('mengajar_list');
	}

	public function addMengajar(){

		if ($this->input->post('submit')) {
			//
		}

		$this->load->view('addMengajar');
	}
}
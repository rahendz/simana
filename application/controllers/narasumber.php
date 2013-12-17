<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narasumber extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper ( 'url' );

		$this->load->model ( array ( 'narasumber_model', 'mlogin' ) );

		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index(){
		$data['narasumber'] = $this->narasumber_model->getAllNarasumber();
		//print_r($data->result());exit();
		$this->load->view('narasumber_list',$data);
	}

	public function addNarasumber($id=""){
		//print_r($this->input->post());exit();
		$data['tes'] = "";

		if($this->input->post('submit')){
			$this->narasumber_model->addNarasumber($this->input->post(),$id);
			redirect('narasumber');
		}

		if ($id != "") {
			$data['data'] = $this->narasumber_model->getNarasumberId($id);
		}
		
		$this->load->view('addNarasumber',$data);
	}

	public function deleteNarasumber($id){
		$this->narasumber_model->deleteNarasumberById($id);
		redirect('narasumber');
	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tot extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('tot_model');
	}

	public function index(){
		$data['tot'] = $this->tot_model->getAllTot();
		$this->load->view('tot_list',$data);
	}

	public function addTot($id=""){
		$data['tes'] = "";

		if($this->input->post('submit')){
			$this->tot_model->addTot($this->input->post(),$id);
			redirect('tot');
		}

		if ($id != "") {
			$data['data'] = $this->tot_model->getTotById($id);
		}
		
		$this->load->view('addTot',$data);
	}

	public function deleteTot($id){
		$this->tot_model->deleteTotById($id);
		redirect('tot');
	}
}
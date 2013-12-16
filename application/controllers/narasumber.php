<?php defined ( "BASEPATH" ) OR die();

class Narasumber extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('session');

		print_r ( $this->session->all_userdata() );
	}

}

/* End of file narasumber.php */
/* Location: ./application/controllers/narasumber.php */
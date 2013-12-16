<?php defined ( "BASEPATH" ) OR die();

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('url');

		$this->load->library('session');

		if ( $this->session->userdata ( 'logged_in' ) )

			$this->session->sess_destroy();

		redirect();
	}

}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */
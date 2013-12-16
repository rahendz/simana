<?php defined ( "BASEPATH" ) OR die();

class Sertifikat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->helper('url');

		if ( ! $this->__is_logged() ) redirect();

		echo "halaman sertifikat";
	}

	private function __is_logged()
	{
		$this->load->model ( "mlogin" );

		return $this->mlogin->__is_logged();
	}

}

/* End of file sertifikat.php */
/* Location: ./application/controllers/sertifikat.php */
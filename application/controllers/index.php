<?php defined ( "BASEPATH" ) OR die ( "hae~" );

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		/* LIBRARY */
		$this->load->library ( array ( "parser" ) );
	}

	public function index()
	{
		$this->load->helper ( "url" );

		$this->load->library ( "session" );

		if ( $this->session->userdata ( "logged_in" ) )

			redirect ( "narasumber" );

		else redirect ( "login" );
	}

}
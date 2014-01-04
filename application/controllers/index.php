<?php defined ( "BASEPATH" ) OR die ( "hae~" );

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		/* LIBRARY */
		$this->load->library ( 'parser' );

		/* HELPER */
		$this->load->helper ( 'url' );

		/* MODEL */
		$this->load->model ( array ( 'mlogin', 'mapps' ) );

		/* CHECKING AUTH USER */
		if ( ! $this->mlogin->__is_logged() ) redirect ( 'login' );
	}

	public function index()
	{
		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'welcome' ) );
	}

}
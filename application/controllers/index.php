<?php defined ( "BASEPATH" ) OR die ( "hae~" );

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		/* LIBRARY */
		$this->load->library ( array ( 'parser', 'session' ) );

		/* HELPER */
		$this->load->helper ( 'url' );

		/* MODEL */
		$this->load->model ( array ( 'mlogin', 'mapps' ) );

		/* CHECKING AUTH USER */
		if ( ! $this->mlogin->__is_logged() ) redirect ( 'login' );
	}

	public function index()
	{
		/* VARIABLE */

		$view_file	= "welcome";

		/* INITIATE HEADER */

		$header["site_title"]	= $this->mapps->site_title() . " - Home";

		/* INITIATE THEME */

		$index["get_header"]	= $this->parser->parse ( "header", $header, TRUE );

		$index["get_sidebar"]	= $this->parser->parse ( "sidebar", array(), TRUE );

		$index["get_content"]	= $this->parser->parse ( $view_file, array(), TRUE );

		$index["get_footer"]	= $this->parser->parse ( "footer", array(), TRUE );

		/* RETURN */

		return $this->parser->parse ( "index", $index );
	}

}
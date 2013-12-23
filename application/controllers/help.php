<?php defined ( "BASEPATH" ) OR die ( "hae~" );

class Help extends CI_Controller {

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
		/* VARIABLE */
		$view_file	= "help";

		/* INITIATE HEADER */
		$header["site_title"]		= $this->mapps->site_title() . " - Home";

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->mapps->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->mapps->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->mapps->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->mapps->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->mapps->__is_active ( "help" );

		/* INITIATE CONTENT */
		$content['index'] 			= NULL;

		/* INITIATE FOOTER */
		$footer['index'] 			= NULL;

		/* INITIATE THEME */
		$index["get_header"]		= $this->parser->parse ( "header", $header, TRUE );

		$index["get_sidebar"]		= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$index["get_content"]		= $this->parser->parse ( $view_file, $content, TRUE );

		$index["get_footer"]		= $this->parser->parse ( "footer", $footer, TRUE );

		/* RETURN */

		return $this->parser->parse ( "index", $index );
	}

}
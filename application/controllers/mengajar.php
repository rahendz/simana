<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mengajar extends CI_Controller {

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
		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		/* VARIABLE */
		$view_file	= "mengajar_list";

		/* INITIATE HEADER */
		$header["site_title"]	= $this->mapps->site_title() . " - " . ucwords ( strtolower ( __CLASS__ ) );

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

	public function add()
	{

		if ($this->input->post('submit')) {
			//
		}

		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - Tambah " . ucwords ( strtolower ( __CLASS__ ) );

		$header["body_class"]	= " class=\"content\"";

		$mengajar["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$mengajar["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );

		return $this->parser->parse ( "mengajar_form", $mengajar );
	}

	public function edit ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect ( "mengajar" );

		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - Ubah " . ucwords ( strtolower ( __CLASS__ ) );

		$header["body_class"]	= " class=\"content\"";

		$mengajar["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$mengajar["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );

		return $this->parser->parse ( "mengajar_list", $mengajar );
	}

	public function delete ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect ( "mengajar" );
	}

}
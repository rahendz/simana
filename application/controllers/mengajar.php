<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mengajar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper ( 'url' );
		
		$this->load->model ( array ( 'mlogin', 'mapps' ) );

		$this->load->library ( 'parser' );

		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - " . ucwords ( strtolower ( __CLASS__ ) );

		$header["body_class"]	= " class=\"content\"";

		$mengajar["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$mengajar["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );

		return $this->parser->parse ( "mengajar_list", $mengajar );
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narasumber extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		/* LIBRARY */
		$this->load->library ( array('parser','session') );

		/* HELPER */
		$this->load->helper ( 'url' );

		/* MODEL */
		$this->load->model ( array ( 'narasumber_model', 'mlogin', 'mapps' ) );

		/* CHECKING AUTH USER */
		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		/* VARIABLE */
		$view_file	= "narasumber_list";

		/* INITIATE HEADER */
		$header["site_title"]		= $this->mapps->site_title() . " - " . ucwords ( strtolower ( __CLASS__ ) );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->mapps->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->mapps->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->mapps->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->mapps->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->mapps->__is_active ( "help" );

		/* INITIATE CONTENT */
		$content['narasumber'] 		= $this->narasumber_model->get()->result();
		$content['notif']			= $this->session->flashdata('notif');

		/* INITIATE SIDEBAR */
		$footer['narasumber'] 		= NULL;

		/* INITIATE THEME */
		$narasumber["get_header"] 	= $this->parser->parse ( "header", $header, TRUE );

		$narasumber["get_sidebar"] 	= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$narasumber["get_content"] 	= $this->parser->parse ( $view_file, $content, TRUE );

		$narasumber["get_footer"] 	= $this->parser->parse ( "footer", $footer, TRUE );
		
		return $this->parser->parse ( 'index', $narasumber );
	}

	public function add ()
	{
		/* action form */
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect('narasumber');

		/* VARIABLE */
		$view_file	= "narasumber_form";

		/* INITIATE HEADER */
		$header["site_title"]		= $this->mapps->site_title() . " - Tambah " . ucwords ( strtolower ( __CLASS__ ) );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->mapps->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->mapps->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->mapps->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->mapps->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->mapps->__is_active ( "help" );

		/* INITIATE CONTENT */
		$content 					= array ( 'nama'=>'', 'instansi'=>'', 'lokasi'=>'', 'telp'=>'', 'email'=>'' );
		$content['action_url'] 		= current_url();

		/* INITIATE SIDEBAR */
		$footer['narasumber'] 		= NULL;

		/* INITIATE THEME */

		//$narasumber = array ( 'nama'=>'', 'instansi'=>'', 'lokasi'=>'', 'telp'=>'', 'email'=>'' );

		$narasumber["get_header"] 	= $this->parser->parse ( "header", $header, TRUE );

		$narasumber["get_sidebar"] 	= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$narasumber["get_content"] 	= $this->parser->parse ( $view_file, $content, TRUE );

		$narasumber["get_footer"] 	= $this->parser->parse ( "footer", $footer, TRUE );
		
		return $this->parser->parse ( 'index', $narasumber );

	}

	public function edit ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect('narasumber');

		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->edit ( $this->input->post ( NULL, TRUE ), $id ) !== FALSE )

				redirect('narasumber');

		/* VARIABLE */
		$view_file	= "narasumber_form";

		/* INITIATE HEADER */
		$header["site_title"]		= $this->mapps->site_title() . " - Edit " . ucwords ( strtolower ( __CLASS__ ) );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->mapps->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->mapps->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->mapps->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->mapps->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->mapps->__is_active ( "help" );

		/* INITIATE CONTENT */
		$content 					= $this->narasumber_model->getById ( $id );
		//$content 					= array ( 'nama'=>'', 'instansi'=>'', 'lokasi'=>'', 'telp'=>'', 'email'=>'' );
		$content['action_url'] 		= current_url();

		/* INITIATE SIDEBAR */
		$footer['narasumber'] 		= NULL;

		/* INITIATE THEME */

		//$narasumber = array ( 'nama'=>'', 'instansi'=>'', 'lokasi'=>'', 'telp'=>'', 'email'=>'' );

		$narasumber["get_header"] 	= $this->parser->parse ( "header", $header, TRUE );

		$narasumber["get_sidebar"] 	= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$narasumber["get_content"] 	= $this->parser->parse ( $view_file, $content, TRUE );

		$narasumber["get_footer"] 	= $this->parser->parse ( "footer", $footer, TRUE );
		
		return $this->parser->parse ( 'index', $narasumber );	

	}

	public function delete ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect();

		$this->narasumber_model->delete ( $id );

		redirect('narasumber');
	}

}
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
		/* INITIATE CONTENT */
		$content['narasumber'] 		= $this->narasumber_model->get();
<<<<<<< HEAD
		$content['notif']			= $this->session->flashdata('notif');
=======
>>>>>>> origin/rahendz

		$content['notif']			= $this->session->flashdata('notif');

		return $this->parser->parse ( 'index', $this->mapps->__initiate ( 'narasumber_list', strtoupper ( __CLASS__ ), $content ) );
	}

	public function add ()
	{
		/* action form */
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect('narasumber');
<<<<<<< HEAD

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

=======

		/* INITIATE CONTENT */
		$content 					= array ( 'nama'=>'', 'instansi'=>'', 'lokasi'=>'', 'telp'=>'', 'email'=>'' );

		$content['action_url'] 		= current_url();
		
		return $this->parser->parse ( 'index', $this->mapps->__initiate ( 'narasumber_form', strtoupper ( __CLASS__ ), $content ) );

>>>>>>> origin/rahendz
	}

	public function edit ( $id = NULL )
	{
<<<<<<< HEAD
		if ( is_null ( $id ) ) redirect('narasumber');
=======
		if ( is_null ( $id ) ) redirect ( 'narasumber' );
>>>>>>> origin/rahendz

		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->edit ( $this->input->post ( NULL, TRUE ), $id ) !== FALSE )

				redirect('narasumber');
<<<<<<< HEAD

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
=======

		/* INITIATE CONTENT */
		$content 					= $this->narasumber_model->getById ( $id );

		$content['action_url'] 		= current_url();
		
		return $this->parser->parse ( 'index', $this->mapps->__initiate ( 'narasumber_form', strtoupper ( __CLASS__ ), $content ) );	
>>>>>>> origin/rahendz

	}

	public function delete ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect();

		$this->narasumber_model->delete ( $id );

<<<<<<< HEAD
		redirect('narasumber');
=======
		redirect ( 'narasumber' );
>>>>>>> origin/rahendz
	}

}
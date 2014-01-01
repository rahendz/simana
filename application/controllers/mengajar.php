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
<<<<<<< HEAD
		$this->load->model ( array ( 'mlogin', 'mapps' , 'narasumber_model' ) );
=======
		$this->load->model ( array ( 'mlogin', 'mapps', 'narasumber_model' ) );
>>>>>>> origin/rahendz

		/* CHECKING AUTH USER */
		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		/* INITIATE CONTENT */
		$content['index'] 			= NULL;

		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'mengajar_list', strtoupper ( __CLASS__ ), $content ) );
	}

	public function add()
	{
		/* ACTION FORM */
		if ( $this->input->post ( 'submit', TRUE ) AND 

<<<<<<< HEAD
		/* ACTION FORM */
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->mengajar_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect('mengajar');

		/* VARIABLE */
		$view_file	= "mengajar_form";

		/* INITIATE HEADER */
		$header["site_title"]	= $this->mapps->site_title() . " - Tambah " . ucwords ( strtolower ( __CLASS__ ) );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->mapps->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->mapps->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->mapps->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->mapps->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->mapps->__is_active ( "help" );

		/* INITIATE CONTENT */
		$content 					= array('nama'=>'','tempat'=>'','jumlah'=>'','tanggal'=>'','catatan'=>'','surat_penugasan'=>'');
		$content['narasumber']		= $this->narasumber_model->get();
		//print_r($content['narasumber']);exit();
		$content['action_url'] 		= current_url();

		/* INITIATE FOOTER */
		$footer['index'] 			= NULL;

		/* INITIATE THEME */
		$index["get_header"]		= $this->parser->parse ( "header", $header, TRUE );

		$index["get_sidebar"]		= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$index["get_content"]		= $this->parser->parse ( $view_file, $content, TRUE );

		$index["get_footer"]		= $this->parser->parse ( "footer", $footer, TRUE );

		/* RETURN */

		return $this->parser->parse ( "index", $index );
=======
			$this->mengajar_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect('mengajar');

		/* INITIATE CONTENT */
		$content 					= array ( 'nama' => '', 'tempat' => '', 'jumlah' => '', 'tanggal' => '', 'catatan' => '', 'surat_penugasan' => '' );

		$content['narasumber']		= $this->narasumber_model->get();

		$content['action_url'] 		= current_url();

		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'mengajar_form', "Tambah " . strtoupper ( __CLASS__ ), $content ) );
>>>>>>> origin/rahendz

	}

	public function edit ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect ( "mengajar" );

		/* INITIATE CONTENT */
		$content['null']	= NULL;

		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'mengajar_list', strtoupper ( __CLASS__ ), $content ) );
	}

	public function delete ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect ( "mengajar" );
	}

}
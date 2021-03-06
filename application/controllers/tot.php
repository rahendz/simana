<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		/* LIBRARY */
		$this->load->library ( 'parser' );

		/* HELPER */
		$this->load->helper ( 'url' );
		
		/* MODEL */
		$this->load->model ( array ( 'tot_model', 'mlogin', 'mapps', 'msertifikat' ) );

		/* CHECKING AUTH USER */
		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		/* INITIATE CONTENT */
<<<<<<< HEAD
		$content['tot'] = $this->tot_model->get()->result();
		$content['notif']			= $this->session->flashdata('notif');
		
		/* INITIATE FOOTER */
		$footer['tot'] 			= NULL;

		/* INITIATE THEME */
		$index["get_header"]		= $this->parser->parse ( "header", $header, TRUE );

		$index["get_sidebar"]		= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$index["get_content"]		= $this->parser->parse ( $view_file, $content, TRUE );

		$index["get_footer"]		= $this->parser->parse ( "footer", $footer, TRUE );
=======
		$content['tot'] 	= $this->tot_model->get()->result();
>>>>>>> origin/rahendz

		$content['notif']	= $this->session->flashdata('notif');
		
		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'tot_list', NULL, $content ) );
	}

	public function add()
	{
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->tot_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect ( 'tot' );

<<<<<<< HEAD
		/* VARIABLE */
		$view_file	= "tot_form";

		/* INITIATE HEADER */
		$header["site_title"]	= $this->mapps->site_title() . " - Tambah " . strtoupper ( __CLASS__ );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->mapps->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->mapps->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->mapps->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->mapps->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->mapps->__is_active ( "help" );

		/* INITIATE CONTENT */
		$content 					= array ( 'nama'=>'');
		$content['action_url'] 		= current_url();
		
		/* INITIATE FOOTER */
		$footer['tot'] 			= NULL;

		/* INITIATE THEME */
		$index["get_header"]		= $this->parser->parse ( "header", $header, TRUE );

		$index["get_sidebar"]		= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$index["get_content"]		= $this->parser->parse ( $view_file, $content, TRUE );

		$index["get_footer"]		= $this->parser->parse ( "footer", $footer, TRUE );

		/* RETURN */

		return $this->parser->parse ( "index", $index );
=======
		/* INITIATE CONTENT */
		$content 					= array ( 'nama'=>'' );

		$content['action_url'] 		= current_url();
		
		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'tot_form', "Tambah " . strtoupper ( __CLASS__ ), $content ) );
>>>>>>> origin/rahendz
	}

	public function edit ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect ( 'tot' );
		
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->tot_model->edit ( $this->input->post ( NULL, TRUE ), $id ) !== FALSE )

				redirect ( 'tot' );

<<<<<<< HEAD
		/* VARIABLE */
		$view_file	= "tot_form";

		/* INITIATE HEADER */
		$header["site_title"]	= $this->mapps->site_title() . " - Edit " . strtoupper ( __CLASS__ );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->mapps->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->mapps->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->mapps->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->mapps->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->mapps->__is_active ( "help" );

		/* INITIATE CONTENT */
		$content 					= $this->tot_model->getById ( $id );
		$content['action_url'] 		= current_url();
		
		/* INITIATE FOOTER */
		$footer['tot'] 			= NULL;

		/* INITIATE THEME */
		$index["get_header"]		= $this->parser->parse ( "header", $header, TRUE );

		$index["get_sidebar"]		= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$index["get_content"]		= $this->parser->parse ( $view_file, $content, TRUE );

		$index["get_footer"]		= $this->parser->parse ( "footer", $footer, TRUE );

		/* RETURN */

		return $this->parser->parse ( "index", $index );
=======
		/* INITIATE CONTENT */
		$content 					= $this->tot_model->getById ( $id );

		$content['action_url'] 		= current_url();
		
		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'tot_form', "Edit " . strtoupper ( __CLASS__ ), $content ) );
>>>>>>> origin/rahendz
	}

	public function delete ( $id )
	{
		$this->tot_model->delete ( $id );
		
		redirect('tot');
	}

	public function sertifikat ( $type = "view", $kode = NULL )
	{
		if ( is_null ( $kode ) AND ( $type === "detail" OR $type === "delete" ) )

			redirect ( "tot/sertifikat" );

		switch ( $type ) :

			case "view": return $this->sertifikat_view(); break;

			case "add": return $this->sertifikat_add(); break;

			case "detail": return $this->sertifikat_detail ( $kode ); break;

			case "delete": return $this->sertifikat_delete ( $kode ); break;

			default: redirect ( "tot/sertifikat" ); break;

		endswitch;
	}

		protected function sertifikat_view()
		{
			/* INITIATE CONTENT */
			$content['serts'] 			= $this->msertifikat->get()->result();
			
			/* RETURN */
			return $this->parser->parse ( "index", $this->mapps->__initiate ( "sertifikat_list", "Sertifikat " . strtoupper ( __CLASS__ ), $content ) );
		}

		protected function sertifikat_add()
		{
			echo "sertifikat add";
		}

		protected function sertifikat_detail()
		{
			echo "sertifikat detail";
		}

		protected function sertifikat_delete()
		{
			echo "sertifikat delete";
		}

}
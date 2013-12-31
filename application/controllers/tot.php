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

	protected function __initiate ( $view_file, $title = NULL, $content = NULL )
	{
		/* INITIATE HEADER */
		$header["site_title"]		= $this->mapps->site_title() . " - " . ( is_null ( $title ) ? strtoupper ( __CLASS__ ) : $title );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->mapps->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->mapps->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->mapps->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->mapps->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->mapps->__is_active ( "help" );

		/* INITIATE FOOTER */
		$footer['tot'] 			= NULL;

		/* INITIATE THEME */
		$init["get_header"]		= $this->parser->parse ( "header", $header, TRUE );

		$init["get_sidebar"]	= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$init["get_content"]	= $this->parser->parse ( $view_file, $content, TRUE );

		$init["get_footer"]		= $this->parser->parse ( "footer", $footer, TRUE );

		return $init;
	}

	public function index()
	{
		/* INITIATE CONTENT */
		$content['tot'] = $this->tot_model->get()->result();
		
		/* RETURN */
		return $this->parser->parse ( "index", $this->__initiate ( 'tot_list', NULL, $content ) );
	}

	public function add()
	{
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->tot_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect ( 'tot' );

		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - Tambah " . ucwords ( strtolower ( __CLASS__ ) );

		$header["body_class"]	= " class=\"content\"";

		$tot = array ( 'nama' => '' );

		$tot["action_url"] = current_url();

		$tot["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$tot["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		return $this->parser->parse ( 'tot_form', $tot );
	}

	public function edit ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect ( 'tot' );
		
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->tot_model->edit ( $this->input->post ( NULL, TRUE ), $id ) !== FALSE )

				redirect ( 'tot' );

		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - Edit " . ucwords ( strtolower ( __CLASS__ ) );

		$header["body_class"]	= " class=\"content\"";

		$tot = $this->tot_model->getById ( $id );

		$tot["action_url"] = current_url();

		$tot["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$tot["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		return $this->parser->parse ( 'tot_form', $tot );
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
			return $this->parser->parse ( "index", $this->__initiate ( "sertifikat_list", "Sertifikat " . strtoupper ( __CLASS__ ), $content ) );
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
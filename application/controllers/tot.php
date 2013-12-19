<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper ( 'url' );
		
		$this->load->model ( array ( 'tot_model', 'mlogin', 'mapps' ) );

		$this->load->library ( 'parser' );

		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - " . strtoupper ( __CLASS__ );

		$header["body_class"]	= " class=\"content\"";

		$tot['tot'] = $this->tot_model->get()->result();
		
		$tot["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$tot["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		return $this->parser->parse ( 'tot_list', $tot );
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

			case "view": $this->sertifikat_view(); break;

			case "add": $this->sertifikat_add(); break;

			case "detail": return $this->sertifikat_detail ( $kode ); break;

			case "delete": return $this->sertifikat_delete ( $kode ); break;

			default: redirect ( "tot/sertifikat" ); break;

		endswitch;
	}

		protected function sertifikat_view()
		{
			echo "sertifikat view all";
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
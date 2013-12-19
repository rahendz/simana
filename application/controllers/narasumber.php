<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narasumber extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper ( 'url' );

		$this->load->library ( 'parser' );

		$this->load->model ( array ( 'narasumber_model', 'mlogin', 'mapps' ) );

		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - " . ucwords ( strtolower ( __CLASS__ ) );

		$content['narasumber'] = $this->narasumber_model->get()->result();

		$narasumber["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$narasumber["get_sidebar"] = $this->parser->parse ( "sidebar", array(), TRUE );

		$narasumber["get_content"] = $this->parser->parse ( "narasumber_list", $content, TRUE );

		$narasumber["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		$this->parser->parse ( 'index', $narasumber );
	}

	public function add ()
	{
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect();

		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - Tambah " . ucwords ( strtolower ( __CLASS__ ) );

		$header["body_class"]	= " class=\"content\"";

		$narasumber = array ( 'nama'=>'', 'instansi'=>'', 'lokasi'=>'', 'telp'=>'', 'email'=>'' );
		
		$narasumber['action_url'] = current_url();

		$narasumber["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$narasumber["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		$this->parser->parse ( 'narasumber_form', $narasumber );
	}

	public function edit ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect();

		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->edit ( $this->input->post ( NULL, TRUE ), $id ) !== FALSE )

				redirect();

		$header	= $this->mapps->nav_active();
		
		$header["site_title"]	= $this->mapps->site_title() . " - Ubah " . ucwords ( strtolower ( __CLASS__ ) );

		$header["body_class"]	= " class=\"content\"";

		$content = $this->narasumber_model->getById ( $id );

		$content['action_url'] = current_url();

		$narasumber["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$narasumber["get_content"] = $this->parser->parse ( "narasumber_form", $content, TRUE );
		
		$narasumber["get_sidebar"] = $this->parser->parse ( "sidebar", array(), TRUE );
		
		$narasumber["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		return $this->parser->parse ( 'index', $narasumber );
	}

	public function delete ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect();

		$this->narasumber_model->delete ( $id );

		redirect();
	}

}
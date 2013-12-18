<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Narasumber extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper ( 'url' );

		$this->load->library ( 'parser' );

		$this->load->model ( array ( 'narasumber_model', 'mlogin' ) );

		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		$header["site_title"]	= "SIMANA - Narasumber";
		
		$narasumber['narasumber'] = $this->narasumber_model->get()->result();

		$narasumber["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$narasumber["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		$this->parser->parse ( 'narasumber_list', $narasumber );
	}

	public function add ()
	{
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect();

		$header["site_title"]	= "SIMANA - Tambah Narasumber";

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

		$header["site_title"]	= "SIMANA - Edit Narasumber";

		$narasumber = $this->narasumber_model->getById ( $id );

		$narasumber['action_url'] = current_url();

		$narasumber["get_header"] = $this->parser->parse ( "header", $header, TRUE );

		$narasumber["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		$this->parser->parse ( 'narasumber_form', $narasumber );
	}

	public function delete ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect();

		$this->narasumber_model->delete ( $id );

		redirect();
	}

}
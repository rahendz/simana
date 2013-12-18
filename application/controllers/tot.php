<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper ( 'url' );
		
		$this->load->model ( array ( 'tot_model', 'mlogin' ) );

		$this->load->library ( 'parser' );

		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		$header["site_title"]	= "SIMANA - Narasumber";
		
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

		$header["site_title"]	= "SIMANA - Add TOT";
		
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

		$header["site_title"]	= "SIMANA - Edit TOT";
		
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
}
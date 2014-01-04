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

		$content['notif']			= $this->session->flashdata('notif');

		return $this->parser->parse ( 'index', $this->mapps->__initiate ( 'narasumber_list', strtoupper ( __CLASS__ ), $content ) );
	}

	public function add ()
	{
		/* action form */
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect('narasumber');

		/* INITIATE CONTENT */
		$content 					= array ( 'nama'=>'', 'instansi'=>'', 'lokasi'=>'', 'telp'=>'', 'email'=>'' );

		$content['action_url'] 		= current_url();
		
		return $this->parser->parse ( 'index', $this->mapps->__initiate ( 'narasumber_form', strtoupper ( __CLASS__ ), $content ) );

	}

	public function edit ( $id = NULL )
	{

		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->narasumber_model->edit ( $this->input->post ( NULL, TRUE ), $id ) !== FALSE )

				redirect('narasumber');

		/* INITIATE CONTENT */
		$content 					= $this->narasumber_model->getById ( $id );

		$content['action_url'] 		= current_url();
		
		return $this->parser->parse ( 'index', $this->mapps->__initiate ( 'narasumber_form', strtoupper ( __CLASS__ ), $content ) );	

	}

	public function delete ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect();

		$this->narasumber_model->delete ( $id );

		redirect ( 'narasumber' );
	}

}
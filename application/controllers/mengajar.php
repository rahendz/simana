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
		$this->load->model ( array ( 'mlogin', 'mapps', 'narasumber_model' ) );

		$this->load->model ( array ( 'mlogin', 'mapps', 'narasumber_model', 'mengajar_model' ) );

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
		if ( $this->input->post ( NULL, TRUE ) )

<<<<<<< HEAD
			$this->mengajar_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

			print_r ( $this->input->post ( NULL, TRUE ) );
=======
			if ( $this->mengajar_model->add() ) print_r ( "sukses" );
>>>>>>> origin/rahendz

				else print_r ( "gagal" );

		/* INITIATE CONTENT */
		$content 					= array ( 'nama' => '', 'tempat' => '', 'jumlah' => '', 'tanggal' => '', 'catatan' => '', 'surat_penugasan' => '' );

		$content['narasumber']		= $this->narasumber_model->get();

		$content['action_url'] 		= current_url();

		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'mengajar_form', "Tambah " . strtoupper ( __CLASS__ ), $content ) );

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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekap extends CI_Controller {
	public function __construct(){
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

	public function index(){
		/* INITIATE CONTENT */
		$content['index'] 			= NULL;

		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'rekap_form', strtoupper ( __CLASS__ ), $content ) );

	}
}
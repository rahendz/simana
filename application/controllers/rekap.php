<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekap extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		/* LIBRARY */
		$this->load->library ( 'parser' );

		/* HELPER */
		$this->load->helper ( 'url' );
		
		/* MODEL */
		$this->load->model ( array ( 'mlogin', 'mapps', 'narasumber_model' , 'mrekap') );

		/* CHECKING AUTH USER */
		if ( ! $this->mlogin->__is_logged() ) redirect();

	}

	public function index(){

		/* ACTION FORM */
		if ( $this->input->post ( NULL, TRUE ) ) {

			$content['cekRekap'] = $this->mrekap->bulanan() ;

		}

		/* INITIATE CONTENT */
		$content['index'] 			= NULL;

		$content['bulan']			= array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'); //print_r($content['bulan']);exit();

		$content['narasumber']		= $this->narasumber_model->get();

		$content['action_url'] 		= current_url();


		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'rekap_form', strtoupper ( __CLASS__ ), $content ) );

	}
}
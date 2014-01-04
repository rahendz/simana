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
		$this->load->model ( array ( 'tot_model', 'mlogin', 'mapps', 'msertifikat', 'narasumber_model' ) );

		/* CHECKING AUTH USER */
		if ( ! $this->mlogin->__is_logged() ) redirect();
	}

	public function index()
	{
		/* INITIATE CONTENT */

		$content['tot'] 	= $this->tot_model->get()->result();

		$content['notif']	= $this->session->flashdata('notif');
		
		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'tot_list', NULL, $content ) );
	}

	public function add()
	{
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->tot_model->add ( $this->input->post ( NULL, TRUE ) ) !== FALSE )

				redirect ( 'tot' );

		/* INITIATE CONTENT */
		$content 					= array ( 'nama'=>'' );

		$content['action_url'] 		= current_url();
		
		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'tot_form', "Tambah " . strtoupper ( __CLASS__ ), $content ) );
	}

	public function edit ( $id = NULL )
	{
		if ( is_null ( $id ) ) redirect ( 'tot' );
		
		if ( $this->input->post ( 'submit', TRUE ) AND 

			$this->tot_model->edit ( $this->input->post ( NULL, TRUE ), $id ) !== FALSE )

				redirect ( 'tot' );


		/* INITIATE CONTENT */
		$content 					= $this->tot_model->getById ( $id );

		$content['action_url'] 		= current_url();
		
		/* RETURN */
		return $this->parser->parse ( "index", $this->mapps->__initiate ( 'tot_form', "Edit " . strtoupper ( __CLASS__ ), $content ) );
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

			case "edit": return $this->sertifikat_edit ( $kode ); break;

			case "delete": return $this->sertifikat_delete ( $kode ); break;

			default: redirect ( "tot/sertifikat" ); break;

		endswitch;
	}

		protected function sertifikat_view()
		{
			// echo '<pre>';print_r($this->msertifikat->get()->result());exit;
			/* INITIATE CONTENT */
			$content['serts'] 			= $this->msertifikat->get()->result();
			
			/* RETURN */
			return $this->parser->parse ( "index", $this->mapps->__initiate ( "sertifikat_list", "Sertifikat " . strtoupper ( __CLASS__ ), $content ) );
		}

		protected function sertifikat_add()
		{
			if ( $this->input->post ( NULL, TRUE ) )

				if ( $this->msertifikat->add() )

					print_r ( "sukses" );

				else print_r("gagal");

			$content = array ( 

				"idsertifikat_tot" => "", "narasumber_biodata_idnarasumber_biodata" => "", 

				"nomor" => "", "nilai" => "", "tot_idtot" => "" 

				);

			$content['narasumber']	= $this->narasumber_model->get();

			$content['tot'] = $this->tot_model->get()->result();

			$content['action_url'] = current_url();

			$content['disabled'] = NULL;

			$content['tipe']	= "TAMBAH";

			$data = $this->mapps->__initiate ( "sertifikat_form", "Tambah Sertifikat " . strtoupper ( __CLASS__ ), $content );

			/* RETURN */
			return $this->parser->parse ( "index", $data );
		}

		protected function sertifikat_edit ( $sid )
		{

			if ( $this->input->post ( NULL, TRUE ) )

				if ( $this->msertifikat->edit ( $sid ) !== FALSE )

					redirect ( 'tot/sertifikat/edit/' . $sid );

				else print_r('gagal');

			$content = $this->msertifikat->getById ( $sid );

			$content['narasumber']	= $this->narasumber_model->get();

			$content['tot'] = $this->tot_model->get()->result();

			$content['action_url'] = current_url();

			$content['disabled'] = ' disabled="disabled"';

			$content['tipe']	= "UBAH";

			$data = $this->mapps->__initiate ( "sertifikat_form", "Edit Sertifikat " . strtoupper ( __CLASS__ ), $content );

			/* RETURN */
			return $this->parser->parse ( "index", $data );
		}

		protected function sertifikat_delete ( $sid )
		{
			$this->msertifikat->delete ( $sid );

			redirect ( 'tot/sertifikat' );
		}

}
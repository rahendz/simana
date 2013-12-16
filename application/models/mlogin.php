<?php defined ( "BASEPATH" ) OR die();

class MLogin extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function __is_logged()
	{
		$this->load->library ( "session" );
		
		if ( $this->session->userdata ( "logged_in" ) ) return TRUE;
		
		elseif ( $this->__is_valid () ) return TRUE; else return FALSE;
	}

	private function __is_valid()
	{
		$this->load->library ( "form_validation" );
		
		$this->form_validation->set_rules ( "username", "Username", "required" );
		
		$this->form_validation->set_rules ( "password", "Password", "required" );
		
		$username 	= $this->input->post ( "username", TRUE );

		$password 	= $this->input->post ( "password", TRUE );
		
		if ( $this->form_validation->run() )
		
			if ( $this->validation ( $username, $password ) )
			
				return TRUE;
			
		return FALSE;
	}
	
	private function validation ( $a, $b )
	{
		$this->db->select ( "iduser" );
		$this->db->from ( "user" );
		$this->db->where ( "user", $a );
		$this->db->where ( "password", md5 ( $b ) );
		
		$results = $this->db->get();
		
		if ( $results->num_rows() > 0 ) :
		
			$this->load->library ( "session" );
		
			$this->session->set_userdata ( "uid", $results->row()->iduser );
			
			$this->session->set_userdata ( "logged_in", TRUE );
		
			return $results->row()->iduser;
		
		else : return FALSE; endif;
	}
}
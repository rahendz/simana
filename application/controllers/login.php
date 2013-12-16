<?php defined ( "BASEPATH" ) OR die();

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->helper ( "url" );

		$this->load->library ( "parser" );

		$this->load->model ( "mlogin" );
		

		if ( $this->mlogin->__is_logged() ) redirect ( "narasumber" );
		

		$login["username_error"] = form_error ( "username", "<span class='help-block alert-danger'>", "</span>" );

		$login["is_username_error"] = $login["username_error"] ? " has-error" : NULL;

		$login["username_value"] = set_value ( "username" );
		
		$login["password_error"] = form_error ( "password", "<span class='help-block alert-danger'>", "</span>" );
		
		$login["is_password_error"] = $login["password_error"] ? " has-error" : NULL;
		
		$login["password_value"] = set_value ( "password" );

		$login["userpass_error"] = ( ! $this->mlogin->__is_logged() AND ( ! $login["username_error"] OR ! $login["password_error"] )

			AND ( set_value ( "username" ) OR set_value ( "password" ) ) ) ? 

			"<span class=\"help-block alert-danger\">Wrong Username or Password</span>" : NULL;
		

		$login["get_header"] = $this->parser->parse ( "header", array(), TRUE );
		
		$login["get_footer"] = $this->parser->parse ( "footer", array(), TRUE );
		
		return $this->parser->parse ( "login", $login );
	}

	public function test()
	{
		echo "test";
	}
}
<?php defined ( "BASEPATH" ) OR die();

class Mapps extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function __is_active ( $page )
	{
		return $this->uri->segment ( 1, 'home' ) === $page ? ' class="active"' : NULL;
		/*$page = $this->uri->segment(1);

		$active = " class=\"active\"";

		$narasumber = $mengajar = $tot = "";

		switch ( $page ) :

			case "narasumber": default: $narasumber = $active; break;

			case "mengajar": $mengajar = $active; break;

			case "tot": $tot = $active; break;

		endswitch;

		return array ( "is_narasumber" => $narasumber, "is_mengajar" => $mengajar, "is_tot" => $tot );*/
	}

	public function site_title()
	{
		return "SIMANA";
	}

	public function __initiate ( $view_file, $title = NULL, $content = NULL )
	{
		/* INITIATE HEADER */
		$header["site_title"]		= $this->site_title() . " - " . ( is_null ( $title ) ? strtoupper ( __CLASS__ ) : $title );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]			= $this->__is_active ( "home" );

		$sidebar["is_narasumber"]	= $this->__is_active ( "narasumber" );

		$sidebar["is_tot"]			= $this->__is_active ( "tot" );

		$sidebar["is_mengajar"]		= $this->__is_active ( "mengajar" );

		$sidebar["is_help"]			= $this->__is_active ( "help" );

		/* INITIATE FOOTER */
		$footer['tot'] 				= NULL;

		/* INITIATE THEME */
		$init["get_header"]			= $this->parser->parse ( "header", $header, TRUE );

		$init["get_sidebar"]		= $this->parser->parse ( "sidebar", $sidebar, TRUE );

		$init["get_content"]		= $this->parser->parse ( $view_file, $content, TRUE );

		$init["get_footer"]			= $this->parser->parse ( "footer", $footer, TRUE );

		return $init;
	}

}

/* End of file  */
/* Location: ./application/models/ */
<?php defined ( "BASEPATH" ) OR die();

class Mapps extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	protected function __is_active ( $page, $as_attr = TRUE )
	{
		$active = $as_attr ? ' class="active"' : ' active';

		return $this->uri->segment ( 1, 'home' ) === $page ? $active : NULL;
	}

	protected function __is_active_child ( $subpage )
	{
		return $this->uri->segment ( 1, 'home' ) === $subpage ? TRUE : FALSE;
	}

	public function site_title()
	{
		return "SIMANA";
	}

	public function __initiate ( $view_file, $title = NULL, $content = array() )
	{
		/* INITIATE HEADER */
		$header["site_title"]		= $this->site_title() . ( is_null ( $title ) ? NULL : " - " . $title );

		/* INITIATE SIDEBAR */
		$sidebar["is_home"]						= $this->__is_active ( "home" );

		$sidebar["is_narasumber"]				= $this->__is_active ( "narasumber", FALSE );

		$sidebar["is_narasumber_collapsed"]		= $this->__is_active_child ( "narasumber" ) ? 'in' : 'collapse';

		$sidebar["is_tot"]						= $this->__is_active ( "tot", FALSE );

		$sidebar["is_tot_collapsed"]			= $this->__is_active_child ( "tot" ) ? 'in' : 'collapse';

		$sidebar["is_mengajar"]					= $this->__is_active ( "mengajar", FALSE );

		$sidebar["is_mengajar_collapsed"]		= $this->__is_active_child ( "mengajar" ) ? 'in' : 'collapse';

		$sidebar["is_rekap"]					= $this->__is_active ( "rekap" , FALSE);

		$sidebar["is_rekap_collapsed"]			= $this->__is_active_child ( "rekap" ) ? 'in' : 'collapse';

		$sidebar["is_help"]						= $this->__is_active ( "help" );

		/* INITIATE FOOTER */
		$footer 				= array();

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
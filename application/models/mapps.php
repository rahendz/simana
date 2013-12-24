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

}

/* End of file  */
/* Location: ./application/models/ */
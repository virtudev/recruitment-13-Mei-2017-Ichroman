<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include( APPPATH . 'libraries/REST_Controller.php' );

class Restful extends REST_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index_post() {
		$data = $this->post();

		$this->load->model( 'restinput_m' );
		$this->restinput_m->insert_db( $data );

		// $this->load->helper( 'xml' );
		// $dom = xml_dom();
		// $root = xml_add_child($dom, 'root');
		// xml_add_child($root, 'string', 'OK');

		$domtree = new DOMDocument('1.0', 'UTF-8');
    	$xmlRoot = $domtree->createElement( 'root');
    	$xmlRoot = $domtree->appendChild( $xmlRoot );
    	$element = $domtree->createElement( 'string' , 'OK' );
		$xmlRoot->appendChild( $element );

		$this->set_response( $domtree->saveXML() , 200 );
	}
}

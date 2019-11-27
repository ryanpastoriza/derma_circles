<?php
/**
 * 
 */
class MY_Controller extends CI_Controller {
	
	function __construct() {

		parent::__construct();

		if( !$this->session->has_userdata('logged_in') || !$this->session->logged_in  ){
			redirect(base_url('login'));
		}

	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * 
 */
class Inventory extends MY_Controller
{
	
	function index() {

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Inventory']);
		$this->load->view('inventory/inventory');
		$this->load->view('_layouts/footer');

	}

}
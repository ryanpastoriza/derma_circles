<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Schedule extends MY_Controller
{
	
	public function index() {

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Schedule']);
		$this->load->view('schedule/schedule');
		$this->load->view('_layouts/footer');

	}
}
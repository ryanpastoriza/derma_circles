<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Service extends MY_Controller
{

	public function index()
	{
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Service']);
		$this->load->view('service/service');
		$this->load->view('_layouts/footer');
	}

	public function therapist() {

		$data['therapist'] = $this->therapist->get_all(['status' => 'active']);

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Handler']);
		$this->load->view('service/therapist', $data);
		$this->load->view('_layouts/footer');

	}

}

?>
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

		// $data['therapist'] = $this->therapist_model->get_all(['status' => 'active']);

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Therapist']);
		$this->load->view('service/therapist');
		$this->load->view('_layouts/footer');

	}

	public function service_management() {

		$data['patients'] = $this->patient_information->get_all();
		$data['therapist'] = $this->therapist_model->get_all(['status' => 'active', 'type' => 'facialist']);
		$data['services'] = $this->services_model->get_services();

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Service Management']);
		$this->load->view('service/service_management', $data);
		$this->load->view('_layouts/footer');

	}

	public function add_service() {


		$date_created = date('Y-m-d G:i');
		$data = $this->input->post();
		$data['date_created'] = $date_created;

		echo $this->service_transaction->insert($data);

		// var_export($data);

	}

	public function get_service_transactions() {

		$currDate = date('Y-m-d');

		$data['transactions'] = $this->service_transaction->get_service_transactions($currDate);

		$this->load->view('service/service_transactions', $data);

	}


}


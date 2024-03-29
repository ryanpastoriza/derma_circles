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

		$data['therapist'] = $this->therapist_model->get_all(['status' => 'active', 'type' => 'facialist', 'branch_id' => $this->session->branch_id ]);
		$data['services'] = $this->therapist_model->get_services_by_therapist();

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Therapist']);
		$this->load->view('service/therapist', $data);
		$this->load->view('_layouts/footer');

	}

	public function service_management() {

		$data['patients'] = $this->patient_information->get_all();
		$data['therapist'] = $this->therapist_model->get_all(['status' => 'active', 'type' => 'facialist', 'branch_id' => $this->session->branch_id ]);
		$data['services'] = $this->services_model->get_services();

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Service Management']);
		$this->load->view('service/service_management', $data);
		$this->load->view('_layouts/footer');

	}

	public function add_service() {


		$date_created = date('Y-m-d G:i');
		$data = $this->input->post();
		$data['date_created'] = $date_created;
		$data['branch_id'] = $this->session->branch_id;

		echo $this->service_transaction->add_service_transaction($data);
	}

	public function get_service_transactions() {

		$data['filters'] = array(
			'facialist_id' => $this->input->post('data')[0]['facialist_id'] ,
			'patient_id' => $this->input->post('data')[0]['patient_id'] ,
			'date_from' => $this->input->post('data')[0]['date_from'] ,
			'date_to' => $this->input->post('data')[0]['date_to']
		);

		$data['transactions'] = $this->service_transaction->filter_service_transactions($data['filters']);

		$this->load->view('service/service_transactions', $data);
	}


}


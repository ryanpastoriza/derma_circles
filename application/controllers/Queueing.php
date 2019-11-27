<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Queueing extends MY_Controller
{
	
	public function index() {

		$data['patient_info'] = $this->patient_information->get_all();

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Queueing']);
		$this->load->view('queueing/queueing', $data);
		$this->load->view('_layouts/footer');
	}
	public function add_patient_to_queue($patient_id) {
		// get queue number;
		// add array of data
		$data['patient_id'] = $patient_id;
		$data['status'] = 'queue';
		$data['branch_id'] = $this->session->branch_id;
		// check duplicate entry
		$isDuplicate = $this->patient_queueing->get(['patient_id' => $data['patient_id']]);
		// check patient if existing in queue
		if( !$isDuplicate ){
			echo $this->patient_queueing->insert($data);
		}else{
			echo 0;
		}
	}

	public function get_patient() {

		$patient_id = $this->input->post('patient_id');
		$patient = $this->patient_information->get(['patient_id' => $patient_id]);
		// $data['patient'] = $this->patient_information->get(['patient_id' => $id]);
		echo json_encode($patient);

	}

	public function get_patient_queueing() {
		
		$patient_queues = $this->patient_queueing->get_all(
			array(
				'branch_id' => $this->session->branch_id,
				'status' => 'queue'
			)
		);

		$data = array();

		foreach ($patient_queues as $key => $value) {
			$row = [];
			$patient = null;
			$patient = $this->patient_information->get(array($this->patient_information->pk => $value->patient_id ));
			$fullName = $patient->firstname.' '.$patient->middlename.' '.$patient->lastname.' '.$patient->suffix;
			$row[] = $value->patient_id;
			$row[] = ucwords($fullName);
			
			$data['data'][] = $row;
		}
		
		echo json_encode($data);
	}

	public function reset_queue(){

		$this->patient_queueing->empty();

	}

	public function patient_checkout() {

		$patient_id = $this->input->post('patient_id');

		$doctor = $this->therapist_model->get(['status' => 'active', 'type' => 'doctor']);
		$service = $this->services_model->get_services('consultation');

		$data = array(

			'therapist_id' => $doctor->therapist_id,
			'service_id' => $service->services_id,
			'patient_id' => $patient_id,
			'date_created' => date('Y-m-d G:i'),
			'branch_id'    => $this->session->branch_id,

		);
		// add service transaction
		$transaction_id = $this->service_transaction->add_service_transaction($data);
		
		if( $transaction_id > 0) {
			echo $this->patient_queueing->delete([ 'patient_id' => $patient_id ]);
		}

	}

}
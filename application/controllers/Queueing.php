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
			$row[] = $value->queue_id;
			$row[] = ucwords($fullName);
			
			$data['data'][] = $row;
		}
		
		echo json_encode($data);
	}
	public function reset_queue(){

		$this->patient_queueing->empty();

	}

}
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Therapist extends MY_Controller
{

	public function retrieve() {

		$therapist = $this->therapist_model->get_all(['status' => 'active']);

		$data = array();

		foreach ($therapist as $key => $value) {
			$row = [];

			foreach ($value as $key2 => $value2) {
				$row[] = ucwords($value2);
			}
			$data['data'][] = $row;
		}

		echo json_encode($data);

	}
	
	public function create() {

		$data = array(

			'name' => $this->input->post('name'),
			'status' => 'active',
			'branch_id' =>  $this->session->userdata('branch_id'),

		);

		echo $this->therapist_model->insert($data);
		
	}

}
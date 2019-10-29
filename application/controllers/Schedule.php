<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Schedule extends MY_Controller
{
	
	public function index() {

		$patient_schedules = $this->patient_treatment->get_schedules();

		$data = array();
		// $counter = 0;
		foreach ($patient_schedules as $key => $value) {
			// $row = [];
			$full_name = $value->firstname.' '.$value->middlename[0].'. '.$value->lastname.' '.$value->suffix;
			// $row[] = ucwords($full_name);
			$data['data'][] = array(
				'title' => ucwords($full_name),
				'start' => $value->disposition_date,
			);
		}

		// title, start, backgroundColor, borderColor
		
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Schedule']);
		$this->load->view('schedule/schedule', $data);
		$this->load->view('_layouts/footer');

	}



}
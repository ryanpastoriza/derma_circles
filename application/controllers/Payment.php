<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Payment extends MY_Controller
{
	
	public function index() {

		$data['patients'] = $this->patient_information->get_all();

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Patients']);
		$this->load->view('payment/payment', $data);
		$this->load->view('_layouts/footer');

	}

	public function billing_information($patient_id, $transaction_date) {

		$data['billing'] = $this->billing->get_billing($patient_id, $transaction_date);
		
		// echo '<pre>';
		// var_export($data['billing']);
		// echo '</pre>';

		$this->load->view('payment/billing_information', $data);

	}

}
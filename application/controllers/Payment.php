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

		$check = $this->billing_service_transaction->check_billing($patient_id, $transaction_date);

		$data['patient'] = $this->patient_information->get(['patient_id' => $patient_id]);
		$data['billing'] = array();

		if( count($check) > 0 ){
			foreach ($check as $key => $value) {
				$data['billing'][] = $this->service_transaction->get_transaction_by_id($value->transaction_id);
			}
		}

		// echo '<pre>';
		// var_export($data['patient']);
		// echo '</pre>';

		if( $data['patient'] ){
			$this->load->view('payment/billing_information', $data);	
		}else{
			$this->load->view('payment/error', $data);	
		}
		
	}

	public function add_payment() {

		if( $this->input->post('billing')[0] ){
			$billing_id = $this->billing->add_billing($this->input->post('billing')[0]);

			if( count($this->input->post('billing_service_transaction')) > 0 ) {
				foreach ($this->input->post('billing_service_transaction') as $key => $value) {
					$data = array(

						'billing_id' => $billing_id,
						'transaction_id' => $value['transaction_id'],
						'discount' => $value['discount'],
						'subtotal' => $value['subtotal']

					);
					$this->billing_service_transaction->add_billing_service_transaction($data);
				}

				echo $billing_id;
			}
		
		}else{
			echo 0;
		}

	}

}
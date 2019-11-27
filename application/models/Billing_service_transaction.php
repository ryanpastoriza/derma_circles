<?php

/**
 * 
 */
class Billing_service_transaction extends My_Model
{

	public $table = 'billing_service_transaction';

	public function __construct() {
	    parent::__construct();
	}

	public function add_billing_service_transaction($data = array()) {

		$this->insert($data);

	}

	public function check_billing($patient_id, $date) {

		
		$this->db->select('service_transaction.transaction_id');
		$this->db->join('billing_service_transaction', 'billing_service_transaction.transaction_id = service_transaction.transaction_id', 'left outer');
		$this->db->where([
							'billing_service_transaction.transaction_id IS NULL' => null, 
							'service_transaction.patient_id' => $patient_id,
							'date(service_transaction.date_created)' => $date,
							'service_transaction.branch_id' => $this->session->branch_id,
						]);

		$query = $this->db->get('service_transaction');
		return $query->result();

	}

}
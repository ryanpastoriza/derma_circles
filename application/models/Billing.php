<?php

/**
 * 
 */
class Billing extends My_Model
{

	public $table = 'billing';
	public $pk	  = 'billing_id';

	public function __construct() {
	    parent::__construct();
	}

	public function add_billing($data = array()) {

		return $this->insert($data);

	}

	public function get_billing($patient_id, $date) {

		$this->db->select('patient_information.lastname,
							patient_information.firstname,
							patient_information.middlename,
							service_transaction.therapist_id,
							service_transaction.service_id,
							service_transaction.date_created,
							service_transaction.transaction_id,
							service_transaction.discount,
							services.service_name,
							services.price,
							service_category.category_name,
							service_package.package_name,
							therapist.`name`,
							patient_information.suffix,
							patient_information.patient_id
							');
		$this->db->from('patient_information');
		$this->db->join('service_transaction', 'service_transaction.patient_id = patient_information.patient_id', 'inner');
		$this->db->join('services', 'service_transaction.service_id = services.services_id', 'inner');
		$this->db->join('service_category', 'services.category_id = service_category.category_id', 'inner');
		$this->db->join('service_package', 'services.package_id = service_package.service_package_id', 'inner');
		$this->db->join('therapist', 'service_transaction.therapist_id = therapist.therapist_id', 'inner');
		$this->db->where(['date(service_transaction.date_created)' => $date, 
							'patient_information.patient_id' => $patient_id, 
							'service_transaction.branch_id' => $this->session->branch_id]);
		
		$query = $this->db->get();

		return $query->result();

	}

}
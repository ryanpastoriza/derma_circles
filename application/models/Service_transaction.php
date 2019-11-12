<?php

/**
 * 
 */
class Service_transaction extends My_Model
{

	public $table = 'service_transaction';
	public $pk	  = 'transaction_id';

	public function __construct() {
	    parent::__construct();
	}

	public function get_service_transactions() {

		$this->db->select('patient_information.lastname,
							patient_information.firstname,
							patient_information.middlename,
							patient_information.suffix,
							service_transaction.therapist_id,
							service_transaction.service_id,
							service_transaction.date_created,
							service_transaction.transaction_id,
							services.service_name,
							services.price,
							service_category.category_name,
							service_package.package_name,
							therapist.name
							');
		$this->db->from('patient_information');
		$this->db->join('service_transaction', 'service_transaction.patient_id = patient_information.patient_id', 'inner');
		$this->db->join('services', 'service_transaction.service_id = services.services_id', 'inner');
		$this->db->join('service_category', 'services.category_id = service_category.category_id', 'inner');
		$this->db->join('service_package', 'services.package_id = service_package.service_package_id', 'inner');
		$this->db->join('therapist', 'service_transaction.therapist_id = therapist.therapist_id', 'inner');
		$this->db->order_by('service_transaction.date_created ', 'DESC');

		$query = $this->db->get();

		return $query->result();

	}

}
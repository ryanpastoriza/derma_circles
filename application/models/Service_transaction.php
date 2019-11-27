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

	public function get_transaction_by_id($transaction_id) {

		$this->db->select('patient_information.lastname,
							patient_information.firstname,
							patient_information.middlename,
							service_transaction.service_id,
							service_transaction.date_created,
							service_transaction.transaction_id,
							service_transaction.discount,
							services.service_name,
							services.price,
							service_category.category_name,
							service_package.package_name,
							patient_information.suffix,
							patient_information.patient_id
							');
		$this->db->from('patient_information');
		$this->db->join('service_transaction', 'service_transaction.patient_id = patient_information.patient_id', 'inner');
		$this->db->join('services', 'service_transaction.service_id = services.services_id', 'inner');
		$this->db->join('service_category', 'services.category_id = service_category.category_id', 'inner');
		$this->db->join('service_package', 'services.package_id = service_package.service_package_id', 'inner');
		$this->db->where('service_transaction.transaction_id', $transaction_id);
		
		$query = $this->db->get();

		return $query->row();
	}


	public function get_service_transactions($date = null) {

		$this->db->select('patient_information.lastname,
							patient_information.firstname,
							patient_information.middlename,
							service_transaction.therapist_id,
							service_transaction.service_id,
							service_transaction.date_created,
							service_transaction.transaction_id,
							service_transaction.branch_id,
							services.service_name,
							services.price,
							service_category.category_name,
							service_package.package_name,
							therapist.`name`,
							patient_information.suffix,
							patient_information.patient_id,
							branch.branch_name
							');
		$this->db->from('patient_information');
		$this->db->join('service_transaction', 'service_transaction.patient_id = patient_information.patient_id', 'inner');
		$this->db->join('services', 'service_transaction.service_id = services.services_id', 'inner');
		$this->db->join('service_category', 'services.category_id = service_category.category_id', 'inner');
		$this->db->join('service_package', 'services.package_id = service_package.service_package_id', 'inner');
		$this->db->join('therapist', 'service_transaction.therapist_id = therapist.therapist_id', 'inner');
		$this->db->join('branch', 'service_transaction.branch_id = branch.branch_id', 'inner');

		if( $date ){
			$this->db->where(['date(service_transaction.date_created)' => $date, 'service_category.category_name !=' => 'consultation']);
		}else{
			$this->db->where('service_category.category_name !=', 'consultation');	
		}
		
		$this->db->where(['service_transaction.branch_id' => $this->session->branch_id]);
		$this->db->order_by('service_transaction.date_created ', 'DESC');

		$query = $this->db->get();

		return $query->result();
	}

	public function add_service_transaction($data) {

		return $this->insert($data);

	}

}
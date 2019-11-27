<?php

/**
 * 
 */
class Therapist_model extends My_Model
{

	public $table = 'therapist';
	public $pk	  = 'therapist_id';

	public function __construct() {
	    parent::__construct();
	}


	public function get_services_by_therapist($therapist_id = null) {


		$this->db->select('therapist.`name`,
							service_package.package_name,
							service_category.category_name,
							services.service_name,
							services.price,
							billing_service_transaction.subtotal,
							billing_service_transaction.discount,
							service_transaction.date_created
							');
		$this->db->from('service_transaction');
		$this->db->join('billing_service_transaction', 'billing_service_transaction.transaction_id = service_transaction.transaction_id', 'inner');
		$this->db->join('services', 'service_transaction.service_id = services.services_id', 'inner');
		$this->db->join('service_category', 'services.category_id = service_category.category_id', 'inner');
		$this->db->join('service_package', 'services.package_id = service_package.service_package_id', 'inner');
		$this->db->join('therapist', 'service_transaction.therapist_id = therapist.therapist_id', 'inner');
		$this->db->where([
							'service_transaction.branch_id' => $this->session->branch_id,
							'therapist.type' => 'facialist',
						]);
		$this->db->order_by('service_transaction.date_created ', 'DESC');
		
		$query = $this->db->get();

		return $query->result();


		// if( $therapist_id == null ){

		// }

	}

}
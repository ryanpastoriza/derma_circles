<?php

/**
 * 
 */
class Patient_queueing extends My_Model
{

	public $table = 'patient_queueing';
	public $pk	  = 'queue_id';

	public function __construct() {
	    parent::__construct();
	}

	public function empty_queue() {

		$this->db->empty_table($this->table);

	}

	public function check_if_in_queue($patient_id) {

		// $query = $this->db;
		// $query->
	}

	public function get_current_queue_number() {

		// $where = array(
		// 	'date_created' => 
		// );

		// $this->get_all()
	}



}
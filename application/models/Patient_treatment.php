<?php

/**
 * 
 */
class Patient_treatment extends My_Model
{

	public $table = 'patient_treatment';
	public $pk	  = 'treatment_id';

	public function __construct() {
	    parent::__construct();
	}


	public function get_schedules() {

		$this->db->select('patient_information.lastname,
							patient_information.firstname,
							patient_information.middlename,
							patient_information.suffix, 
							patient_treatment.disposition_date');
		$this->db->from('patient_information');
		$this->db->join('patient_treatment', 'patient_treatment.patient_id = patient_information.patient_id', 'left');

		$query = $this->db->get();

		return $query->result();

	}


}
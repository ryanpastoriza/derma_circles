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

}
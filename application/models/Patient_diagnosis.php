<?php

/**
 * 
 */
class Patient_diagnosis extends My_Model
{

	public $table = 'patient_diagnosis';
	public $pk	  = 'diagnosis_id';

	public function __construct() {
	    parent::__construct();
	}

}
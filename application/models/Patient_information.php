<?php

/**
 * 
 */
class Patient_information extends My_Model
{

	public $table = 'patient_information';
	public $pk	  = 'patient_id';

	public function __construct() {
	    parent::__construct();
	}

}
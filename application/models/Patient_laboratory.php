<?php

/**
 * 
 */
class Patient_laboratory extends My_Model
{

	public $table = 'patient_laboratory';
	public $pk	  = 'laboratory_id';

	public function __construct() {
	    parent::__construct();
	}

}
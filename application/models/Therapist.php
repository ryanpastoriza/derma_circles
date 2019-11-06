<?php

/**
 * 
 */
class Therapist extends My_Model
{

	public $table = 'therapist';
	public $pk	  = 'therapist_id';

	public function __construct() {
	    parent::__construct();
	}

}
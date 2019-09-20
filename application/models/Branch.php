<?php

/**
 * 
 */
class Branch extends My_Model
{

	public $table = 'branch';
	public $pk	  = 'branch_id';

	public function __construct() {
	    parent::__construct();
	}

}
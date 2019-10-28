<?php

/**
 * 
 */
class Services_model extends My_Model
{

	public $table = 'services';
	public $pk	  = 'services_id';

	public function __construct() {
	    parent::__construct();
	}

}
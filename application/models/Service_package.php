<?php

/**
 * 
 */
class Service_package extends My_Model
{

	public $table = 'service_package';
	public $pk	  = 'service_package_id';

	public function __construct() {
	    parent::__construct();
	}

}
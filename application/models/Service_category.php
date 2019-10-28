<?php

/**
 * 
 */
class Service_category extends My_Model
{

	public $table = 'service_category';
	public $pk	  = 'category_id';

	public function __construct() {
	    parent::__construct();
	}

}
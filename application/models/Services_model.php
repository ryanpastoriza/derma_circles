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

	public function get_services(){
		$services = $this->db
						->join('service_package', 'services.package_id = service_package.service_package_id')
						->join('service_category', 'services.category_id = service_category.category_id')
						->get('services')
						->result();
		return $services;
	}

}
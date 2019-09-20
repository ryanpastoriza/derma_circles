<?php

/**
 * 
 */
class User_roles extends My_Model
{

	public $table = 'user_roles';
	public $pk	  = 'role_id';

	public function __construct() {
	    parent::__construct();
	}

}
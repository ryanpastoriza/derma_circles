<?php

/**
 * 
 */
class User extends My_Model
{

	public $table = 'user';
	public $pk	  = 'user_id';

	public function __construct() {
	    parent::__construct();
	}

}
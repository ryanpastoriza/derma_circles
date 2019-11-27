<?php

/**
 * 
 */
class Product extends My_Model
{

	public $table = 'product';
	public $pk	  = 'product_id';

	public function __construct() {
	    parent::__construct();
	}


	public function get_products() {

			$this->db->select('product.product_id,
								product.product_name,
								product_category.category_id,
								product_category.category_name,
								product.description,
								product.price
							');
		$this->db->from('product');
		$this->db->join('product_category', 'product.category = product_category.category_id', 'inner');
		$query = $this->db->get();

		return $query->result();


	}

}
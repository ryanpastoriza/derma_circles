<?php

/**
 * 
 */
class Stock_entry extends My_Model
{

	public $table = 'stock_entry';
	public $pk	  = 'stock_entry_id';

	public function __construct() {
	    parent::__construct();
	}

	public function add($data) {
		return $this->insert($data);
	}

	public function get_stock_entries() {

		$this->db->select(' branch.branch_name,
							product.product_name,
							product_category.category_name,
							stock_entry.qty,
							stock_entry.date_created
							');
		$this->db->from('stock_entry');
		$this->db->join('product', 'stock_entry.product_id = product.product_id', 'inner');
		$this->db->join('product_category', 'product.category = product_category.category_id', 'inner');
		$this->db->join('branch', 'stock_entry.branch_id = branch.branch_id', 'inner');

		$query = $this->db->get();

		return $query->result();

	}


}
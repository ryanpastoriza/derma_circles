<?php

/**
 * 
 */
class Stock extends My_Model
{

	public $table = 'stocks';
	public $pk	  = 'stock_id';

	public function __construct() {
	    parent::__construct();
	}

	public function get_current_stock($product_id) {

		return $this->get(['product_id' => $product_id]);
	}

	public function update_stocks($product_id, $qty) {

		return $this->update(['in_stock' => $qty, 'updated_at' => date('Y-m-d G:i')], ['product_id' => $product_id]);

	}

	public function get_stock_list($branch_id) {

		$this->db->select(' branch.branch_name,
							product.product_name,
							product_category.category_name,
							stocks.in_stock
							');
		$this->db->from('stocks');
		$this->db->join('product', 'stocks.product_id = product.product_id', 'inner');
		$this->db->join('product_category', 'product.category = product_category.category_id', 'inner');
		$this->db->join('branch', 'stocks.branch_id = branch.branch_id', 'inner');
		$this->db->where(['stocks.branch_id' => $branch_id]);
		

		$query = $this->db->get();

		return $query->result();

	}
	

}
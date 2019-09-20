<?php

class MY_Model extends CI_Model
{

	protected $table;

	function __construct() {
	    parent::__construct();
	}

	// retreive all records
	public function get_all($where_arr = null, $orderby_arr = null, $select = null){

		if( isset($where_arr) ){
			$this->db->where($where_arr);
		}
		if( isset($orderby_arr) ){

			if( !is_array($orderby_arr) ){
				$order_by[0] = $orderby_arr;
				$order_by[1] = 'asc';
			}else{
				$order_by[0] = $orderby_arr[0];
				$order_by[1] = $orderby_arr[1];
			}
			$this->db->order_by($order_by[0], $order_by[1]);

		}
		if( isset($select) ){
			$this->db->select($select);
		}
		$query = $this->db->get($this->table);
		// echo $this->db->last_query();

		if( $query->num_rows() >0 ){
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}else{
			return FALSE;
		}
	}


	// retrieve single record
	public function get($where_arr = null) {

		if( isset($where_arr) ){
			$this->db->where($where_arr);
			$this->db->limit(1);
			$query = $this->db->get($this->table);

			if( $query->num_rows() > 0 ){
				return $query->row();
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}


	// insert records
	public function insert($columns_arr) {

		if( is_array($columns_arr) ){
			if( $this->db->insert($this->table, $columns_arr) ){
				return $this->db->insert_id();
			}else{
				return FALSE;
			}
		}
	}

	// update records
	public function update($columns_arr, $where_arr = null){

		if( isset($where_arr) ){
			$this->db->where($where_arr);
			$this->db->update($this->table, $columns_arr);

			if( $this->db->affected_rows() >0 ){
				return $this->db->affected_rows();
			}
		}else{
			return FALSE;
		}

	}

	// delete records
	public function delete($where_arr = null) {

		if(isset($where_arr)) {
	      $this->db->where($where_arr);
	      $this->db->delete($this->table);
	      return $this->db->affected_rows();
	    }
	    else {
	      return FALSE;
    	}
	}

}

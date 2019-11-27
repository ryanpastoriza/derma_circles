<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * 
 */
class Inventory extends MY_Controller
{
	
	function index() {

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Inventory']);
		$this->load->view('inventory/inventory');
		$this->load->view('_layouts/footer');

	}

	public function products() {

		$data['category'] = $this->product_category->get_all();

		// var_dump($data['category']);

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Inventory']);
		$this->load->view('inventory/products/products', $data);
		$this->load->view('_layouts/footer');
	
		
	}

	public function create() {

		if( $this->input->post('product_id') == 0 ){
			echo $this->product->insert($this->input->post());
		}else{
			echo $this->product->update($this->input->post(), [$this->product->pk => $this->input->post($this->product->pk)]);
		}

	}


	public function product_list() {

		$products = $this->product->get_products();

		$data = array();

		foreach ($products as $key => $value) {
			$row = [];
			foreach ($value as $key2 => $value2) {
				$row[] = ucwords($value2);
			}
			$data['data'][] = $row;
		}

		echo json_encode($data);

		// var_export($data);

	}	


}
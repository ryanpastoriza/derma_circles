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

		$data = array(
		  'product_name' => $this->input->post('product_name'),
		  'description' => $this->input->post('description'),
		  'category' => $this->input->post('category'),
		  'price' => $this->input->post('price'),
		  'is_active' => 0,
		  'deleted' => 0
		);

		// var_export($this->input->post());

		if( $this->input->post('product_id') == 0 ){
			echo $this->product->insert($data);
		}else{
			echo $this->product->update($data, [$this->product->pk => $this->input->post($this->product->pk)]);
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

	public function stocks() {

		// $data['category'] = $this->product_category->get_all();
		$data['products'] = $this->product->get_products();
		$data['stock_list'] = $this->stock->get_stock_list($this->session->userdata('branch_id'));

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Inventory']);
		$this->load->view('inventory/stocks/stocks', $data);
		$this->load->view('_layouts/footer');
	}

	public function add_stocks() {

		# stock entry
		$stock_entry = array(
			'branch_id' => $this->session->userdata('branch_id'),
			'qty' => $this->input->post('qty'),
			'product_id' => $this->input->post('product_id'),
			'date_created' => date('Y-m-d G:i'),
			'created_by' => $this->session->userdata('user_id'),

		);

		if($this->stock_entry->add($stock_entry) > 0){
			# get current stock
			$product = $this->stock->get(['product_id' => $this->input->post('product_id')]);

			if( $product ){
				#update stock
				$new_stock = $stock_entry['qty'] + $product->in_stock;
				echo $this->stock->update_stocks($this->input->post('product_id'), $new_stock);
			}else{
				# add stock
				$stocks = array(
					'branch_id' => $this->session->userdata('branch_id'),
					'in_stock' => $stock_entry['qty'],
					'product_id' => $this->input->post('product_id'),
					'created_at' => date('Y-m-d G:i'),
					'updated_at' => date('Y-m-d G:i'),
					'created_by' => $this->session->userdata('user_id')

				);
				echo $this->stock->insert($stocks);
			}
		}else{
			echo 0;
		}
	}

	public function get_stock_list() {

		$stocks = $this->stock->get_stock_list($this->session->userdata('branch_id'));

		$data = array();

		foreach ($stocks as $key => $value) {
			$row = [];
			foreach ($value as $key2 => $value2) {
				$row[] = ucwords($value2);
			}
			$data['data'][] = $row;
		}

		echo json_encode($data);
	}

	public function get_stock_entry() {

		$stock_entry = $this->stock_entry->get_stock_entries();

		$data = array();

		foreach ($stock_entry as $key => $value) {
			$row = [];
			foreach ($value as $key2 => $value2) {
				$row[] = ucwords($value2);
			}
			$data['data'][] = $row;
		}

		echo json_encode($data);
	}

	public function stock_transfer() {

		$data['products'] = $this->product->get_products();
		$data['branch'] = $this->branch->get_all();

		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Inventory']);
		$this->load->view('inventory/stock_transfer/stock_transfer', $data);
		$this->load->view('_layouts/footer');
	}

	public function transfer_to() {

				



	}

}
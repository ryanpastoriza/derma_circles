<?php 


/**
 * 
 */
class Branches extends MY_Controller
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index(){
		$branches = $this->branch->get_all();
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Branches']);
		$this->load->view('branches/branches');
		$this->load->view('branches/jscript');
		$this->load->view('_layouts/footer');
	}

	public function add_branch(){

		$this->form_validation->set_rules('branch_name', 'Branch Name', 'required|min_length[3]|is_unique[branch.branch_name]');
		$this->form_validation->set_rules('location', 'Address', 'required|min_length[4]');

		if($this->form_validation->run() === FALSE){
			echo json_encode(validation_errors());
		}
		else{
			$post = (object) $this->input->post();
	    	$this->branch->insert(['branch_name' => ucwords($post->branch_name), 'location' => ucwords($post->location)]);
			echo json_encode(true);
		}
	}

	public function branches(){
		$branches = $this->branch->get_all();
		echo json_encode($branches);
	}

	public function update_branch(){
		$row['branch_name'] = $_REQUEST['value'];
	    $this->db->where('branch_id', $_REQUEST['pk'])->update('branch', $row);
	    if($this->db->affected_rows() == '1'){
			echo json_encode(true);
	    }
	    else{
			echo json_encode(false);
	    }	
	}

	public function update_location(){
		$row['location'] = $_REQUEST['value'];
	    $this->db->where('branch_id', $_REQUEST['pk'])->update('branch', $row);
	    if($this->db->affected_rows() == '1'){
			echo json_encode(true);
	    }
	    else{
			echo json_encode(false);
	    }	
	}

}

?>
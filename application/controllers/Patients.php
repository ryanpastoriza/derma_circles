<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Patients extends MY_Controller
{
	
	public function index() {
		$this->load->view('_layouts/header', ['title' => 'DermaCircles - Patients']);
		$this->load->view('patients/patients');
		$this->load->view('_layouts/footer');
	}

	public function patient_list() {
		
		$patient_info = $this->patient_information->get_all();
		$data = array();
		foreach ($patient_info as $key => $value) {
			$row = [];
			
			$fullName = $value->firstname.' '.$value->middlename.' '.$value->lastname.' '.$value->suffix;
			$row[] = ucwords($fullName);

			foreach ($value as $key2 => $value2) {
				$row[] = $value2;
			}

			$data['data'][] = $row;
		}

		echo json_encode($data);
	}

	public function add_patient() {

		$patient_id = $this->input->post('patient_id');
		$data = $this->input->post();

		if ($patient_id > 0){

			echo $this->patient_information->update($data, array($this->patient_information->pk => $patient_id));

		}else{
			$patient_id = $this->patient_information->insert($data);

			if( $patient_id > 0 ){
				$path = FCPATH. 'assets/uploads/patients/'.$patient_id;
				mkdir($path, 0777, TRUE);
				mkdir($path.'/laboratory', 0777, TRUE);
				mkdir($path.'/diagnosis', 0777, TRUE);
				echo $patient_id;
			}

		}
	}

	public function show_laboratory($id) {

		$data['laboratory'] = $this->patient_laboratory->get_all(['patient_id' => $id]);
		$data['patient'] = $this->patient_information->get(['patient_id' => $id]);
		
		if( $data['laboratory'] ){
			foreach ($data['laboratory'] as $key => $value) {
			
				$path = 'assets/uploads/patients/'.$id.'/laboratory/'.$value->laboratory_id.'/*.{jpg,png,gif,PNG,JPG}';
				$labFiles = glob( $path, GLOB_BRACE );
				$data['laboratory'][$key]->images = $labFiles;
			
			}
		}

		$this->load->view('patients/laboratory_exam', $data);
	}

	public function get_lab_images() {

		$laboratory = $this->patient_laboratory->get(['laboratory_id' => $this->input->post('laboratory_id') ]);

		$path = 'assets/uploads/patients/'.$laboratory->patient_id.'/laboratory/'.$laboratory->laboratory_id.'/*.{jpg,png,gif,PNG,JPG}';

		$data['laboratory'] = $laboratory;
		$data['images'] = glob( $path, GLOB_BRACE );

		$this->load->view('patients/laboratory_images', $data);
	}

	public function add_laboratory() {

		$data = $this->input->post();
		$data['transaction_date'] = date('Y-m-d H:i:s');
		$laboratory_id =  $this->patient_laboratory->insert($data);

		if( $laboratory_id > 0  ){
			// create laboratory dir
			$path = FCPATH. 'assets/uploads/patients/'.$this->input->post('patient_id').'/laboratory/'.$laboratory_id;
			mkdir($path, 0777, TRUE);
			echo $laboratory_id;
		}else{
			echo 0;
		}
	}

	public function update_laboratory(){

		$laboratory_id = $this->input->post('laboratory_id');
		$data = $this->input->post();
		echo $this->patient_laboratory->update($data, array($this->patient_laboratory->pk => $laboratory_id ));
	}

	public function patient_uploads($patient_id, $id, $type) {

		if( isset($_FILES['laboratory_files']['name']) && count($_FILES['laboratory_files']['name']) > 0  ){

			$this->load->library('upload');

			$path = FCPATH. 'assets/uploads/patients/'.$patient_id.'/'.$type.'/'.$id;
			// upload file
			$data = [];

		    $count  = count($_FILES['laboratory_files']['name']);
		    for ($i=0; $i < $count; $i++) { 
		    
		    	if (!empty($_FILES['laboratory_files']['name'][$i])){

		    		$_FILES['file']['name'] = $_FILES['laboratory_files']['name'][$i];
		          	$_FILES['file']['type'] = $_FILES['laboratory_files']['type'][$i];

		          	$_FILES['file']['tmp_name'] = $_FILES['laboratory_files']['tmp_name'][$i];
		          	$_FILES['file']['error'] = $_FILES['laboratory_files']['error'][$i];
		          	$_FILES['file']['size'] = $_FILES['laboratory_files']['size'][$i];

		          	$config['upload_path'] = $path; 
		          	$config['allowed_types'] = 'jpg|jpeg|png|gif';
		          	$config['max_size'] = '5000';
		          	$config['file_name'] = $_FILES['laboratory_files']['name'][$i];

		          	$this->upload->initialize($config);

					if($this->upload->do_upload('file')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];

						$data['totalFiles'][] = $filename;
					}
		    	}
		    }
			// end upload file
		}
	}

	public function save_image($patient_id, $laboratory_id){

		// $fileName = null;
		// $rawFile = $this->input->post('imgBase64');
		// $img = str_replace('data:image/png;base64,', '', $rawFile);
		// // $img = str_replace(' ', '+', $img);
		// $encoded = base64_decode($img);
		// // echo $img;
		// $file = FCPATH . 'assets/patients/'.$fileName.'.png';
		// // $file = RTDIR . 'assets/patients/'.$fileName. '.png';
		// $success = file_put_contents($file, $encoded);	
	}

	public function remove_image() {

		$path;

		var_export($path);



	}

	public function show_diagnosis($id) {

		$data['diagnosis'] = $this->patient_diagnosis->get_all(['patient_id' => $id]);
		$this->load->view('patients/diagnosis_treatment', $data);
	}

	public function add_diagnosis() {

		$data = $this->input->post();
		$data['transaction_date'] = date('Y-m-d H:i:s');
		echo $this->patient_diagnosis->insert($data);
	}

}	
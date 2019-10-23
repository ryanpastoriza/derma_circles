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
			
			$fullName = $value->firstname.' '.$value->middlename[0].'. '.$value->lastname.' '.$value->suffix;
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
				mkdir($path.'/treatment', 0777, TRUE);
				echo $patient_id;
			}

		}
	}
	// laboratory ------------------------------------------------------------
	public function show_laboratory($id) {

		$data['laboratory'] = $this->patient_laboratory->get_all(['patient_id' => $id], array('transaction_date', 'DESC'));
		$data['patient'] = $this->patient_information->get(['patient_id' => $id]);
		
		if( $data['laboratory'] ){
			foreach ($data['laboratory'] as $key => $value) {
			
				$path = 'assets/uploads/patients/'.$id.'/laboratory/'.$value->laboratory_id.'/*.{jpg,png,gif,PNG,JPG}';
				$labFiles = glob( $path, GLOB_BRACE );
				$data['laboratory'][$key]->images = $labFiles;
			
			}
		}

		$this->load->view('patients/laboratory', $data);
	}
	public function add_laboratory() {

		$data = $this->input->post();
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
	public function get_lab_images() {

		$laboratory = $this->patient_laboratory->get(['laboratory_id' => $this->input->post('laboratory_id') ]);

		$path = 'assets/uploads/patients/'.$laboratory->patient_id.'/laboratory/'.$laboratory->laboratory_id.'/*.{jpg,png,gif,PNG,JPG}';

		$data['laboratory'] = $laboratory;
		$data['images'] = glob( $path, GLOB_BRACE );

		// $this->load->view('patients/laboratory_images', $data);
		$this->load->view('patients/patient_images', $data);
	}
	public function laboratory_uploads($patient_id, $id){

		if( isset($_FILES['laboratory_files']['name']) && count($_FILES['laboratory_files']['name']) > 0  ){
			$this->patient_uploads($patient_id, $id, 'laboratory', 'laboratory_files');
		}
	}
	public function update_laboratory(){

		$laboratory_id = $this->input->post('laboratory_id');
		$data = $this->input->post();
		$this->patient_laboratory->update($data, array($this->patient_laboratory->pk => $laboratory_id ));
		echo $laboratory_id;
	}
	// diagnosis ------------------------------------------------------------
	public function get_diag_images() {

		$diagnosis = $this->patient_diagnosis->get(['diagnosis_id' => $this->input->post('diagnosis_id') ]);

		$path = 'assets/uploads/patients/'.$diagnosis->patient_id.'/diagnosis/'.$diagnosis->diagnosis_id.'/*.{jpg,png,gif,PNG,JPG}';

		$data['diagnosis'] = $diagnosis;
		$data['images'] = glob( $path, GLOB_BRACE );

		// $this->load->view('patients/diagnosis_images', $data);
		$this->load->view('patients/patient_images', $data);
	}
	public function show_diagnosis($id) {

		$data['patient'] = $this->patient_information->get(['patient_id' => $id]);
		$data['diagnosis'] = $this->patient_diagnosis->get_all(['patient_id' => $id], array('transaction_date', 'DESC'));

		if( $data['diagnosis'] ){
			foreach ($data['diagnosis'] as $key => $value) {
			
				$path = 'assets/uploads/patients/'.$id.'/diagnosis/'.$value->diagnosis_id.'/*.{jpg,png,gif,PNG,JPG}';
				$diagFiles = glob( $path, GLOB_BRACE );
				$data['diagnosis'][$key]->images = $diagFiles;
			
			}
		}

		$this->load->view('patients/diagnosis', $data);
	}
	public function add_diagnosis() {

		$data = $this->input->post();
		$diagnosis_id = $this->patient_diagnosis->insert($data);

		if( $diagnosis_id > 0  ){
			// create laboratory dir
			$path = FCPATH. 'assets/uploads/patients/'.$this->input->post('patient_id').'/diagnosis/'.$diagnosis_id;
			mkdir($path, 0777, TRUE);
			echo $diagnosis_id;
		}else{
			echo 0;
		}
	}
	public function diagnosis_uploads($patient_id, $id){

		if( isset($_FILES['diagnosis_files']['name']) && count($_FILES['diagnosis_files']['name']) > 0  ){
			$this->patient_uploads($patient_id, $id, 'diagnosis', 'diagnosis_files');
		}
	}
	public function update_diagnosis(){

		$diagnosis_id = $this->input->post('diagnosis_id');
		$data = $this->input->post();
		$this->patient_diagnosis->update($data, array($this->patient_diagnosis->pk => $diagnosis_id ));
		echo $diagnosis_id;
	}
	// treatment ------------------------------------------------------------
	public function show_treatment($id){
		$data['patient'] = $this->patient_information->get(['patient_id' => $id]);
		$data['treatment'] = $this->patient_treatment->get_all(['patient_id' => $id], array('transaction_date', 'DESC'));

		if( $data['treatment'] ){
			foreach ($data['treatment'] as $key => $value) {
			
				$path = 'assets/uploads/patients/'.$id.'/treatment/'.$value->treatment_id.'/*.{jpg,png,gif,PNG,JPG}';
				$treatmentFiles = glob( $path, GLOB_BRACE );
				$data['treatment'][$key]->images = $treatmentFiles;
			
			}
		}

		$this->load->view('patients/treatment', $data);
	}
	public function add_treatment() {

		$data = $this->input->post();
		$treatment_id = $this->patient_treatment->insert($data);

		if( $treatment_id > 0  ){
			// create laboratory dir
			$path = FCPATH. 'assets/uploads/patients/'.$this->input->post('patient_id').'/treatment/'.$treatment_id;
			mkdir($path, 0777, TRUE);
			echo $treatment_id;
		}else{
			echo 0;
		}
	}
	public function treatment_uploads($patient_id, $id){

		if( isset($_FILES['treatment_files']['name']) && count($_FILES['treatment_files']['name']) > 0  ){
			$this->patient_uploads($patient_id, $id, 'treatment', 'treatment_files');
		}
	}
	public function get_treatment_images(){

		$treatment = $this->patient_treatment->get(['treatment_id' => $this->input->post('treatment_id') ]);

		$path = 'assets/uploads/patients/'.$treatment->patient_id.'/treatment/'.$treatment->treatment_id.'/*.{jpg,png,gif,PNG,JPG}';

		$data['treatment'] = $treatment;
		$data['images'] = glob( $path, GLOB_BRACE );

		$this->load->view('patients/patient_images', $data);
	}
	public function update_treatment(){

		$treatment_id = $this->input->post('treatment_id');
		$data = $this->input->post();
		$this->patient_treatment->update($data, array($this->patient_treatment->pk => $treatment_id ));
		echo $treatment_id;
	}
	// ----------------------------------------------------------------------
	public function save_photo($patient_id){

		$fileName = 'profile';
		$rawFile = $this->input->post('imgBase64');
		$img = str_replace('data:image/png;base64,', '', $rawFile);
		$encoded = base64_decode($img);
		$file = FCPATH . 'assets/uploads/patients/'.$patient_id.'/'.$fileName.'.jpg';
		$success = file_put_contents($file, $encoded);
		echo $success;
	}
	public function show_profile_picture(){
		$patient_id = $this->input->post('patient_id');
		$path = 'assets/uploads/patients/'.$patient_id.'/profile.jpg';

		if( file_exists($path) ){
			echo base_url().$path;
		}else{
			echo base_url().'assets/img/avatar.png';
		}
	}
	public function patient_uploads($patient_id, $id, $type, $key) {
		$this->load->library('upload');

		$path = 'assets/uploads/patients/'.$patient_id.'/'.$type.'/'.$id;
		$data = [];

		$count  = count($_FILES[$key]['name']);
		    for ($i=0; $i < $count; $i++) { 
		    
		    	if (!empty($_FILES[$key]['name'][$i])){

		    		$_FILES['file']['name'] = $_FILES[$key]['name'][$i];
		          	$_FILES['file']['type'] = $_FILES[$key]['type'][$i];

		          	$_FILES['file']['tmp_name'] = $_FILES[$key]['tmp_name'][$i];
		          	$_FILES['file']['error'] = $_FILES[$key]['error'][$i];
		          	$_FILES['file']['size'] = $_FILES[$key]['size'][$i];

		          	$config['upload_path'] = $path; 
		          	$config['allowed_types'] = 'jpg|jpeg|png|gif';
		          	$config['max_size'] = '5000';
		          	$config['file_name'] = $_FILES[$key]['name'][$i];

		          	$this->upload->initialize($config);

					if($this->upload->do_upload('file')){
						$uploadData = $this->upload->data();
						$filename = $uploadData['file_name'];
						var_export($filename);
						$data['totalFiles'][] = $filename;
					}
		    	}
		    }
			// end upload file
	}
	public function remove_image() {

		$image = $this->input->post('image');

		if( file_exists($image) ){
			echo unlink($image);
		}
	}
	public function medical_certificate() {
		
		$this->session->set_userdata($this->input->post());
		$this->load->view('patients/medical_certificate');
	}

}	
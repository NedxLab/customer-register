<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("GMT");
		$this->load_auth_libs_etc();
		//load model

	}
	public function index()
	{
		$data['page'] = 'country-list';
		$data['title'] = 'country List';
		$data['geCountries'] = $this->Users->getAllCountries();
		$this->load->view('form', $data);
	}
	public function handleForm()
	{
		$error_message = "";

		$this->form_validation->set_rules('name', 'customer name', 'required');
		$this->form_validation->set_rules('sales', 'Total Sales', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('date', 'Invoice date', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Form Validation Failed
			$error_message = validation_errors();
			$error_message = str_replace("<p>", "<p class='text-danger'>", $error_message);
		} else {
			$name = $this->input->post("name");
			$sales = $this->input->post("sales");
			$country = $this->input->post("country");
			$state = $this->input->post("state");
			$city = $this->input->post("city");
			$date = $this->input->post("date");

			if ($_FILES['image']['name'] != "") {


				$config['upload_path'] = FCPATH . './uploads/images';
				$config['allowed_types'] = 'png';
				$config['max_size'] = 100000;
				$config['max_width'] = 64;
				$config['min_width'] = 64;
				$config['max_height'] = 64;
				$config['min_height'] = 64;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('image')) {

					$error = array('error' => $this->upload->display_errors());

					$error_message .= "<p class='text-danger'>Sorry, Upload Failed!, Try another file with another dimension.</p>";


				} else {
					$data = array('image_metadata' => $this->upload->data());
					$image = 'working';


					$count = count($_FILES['files']['name']);
					$invoice = $count . " files from " . $name;
					for ($i = 0; $i < $count; $i++) {

						if (!empty($_FILES['files']['name'][$i])) {

							$_FILES['file']['name'] = $_FILES['files']['name'][$i];
							$_FILES['file']['type'] = $_FILES['files']['type'][$i];
							$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
							$_FILES['file']['error'] = $_FILES['files']['error'][$i];
							$_FILES['file']['size'] = $_FILES['files']['size'][$i];

							$config['upload_path'] = FCPATH . './uploads/pdf';
							$config['allowed_types'] = 'pdf';
							$config['max_size'] = '50000';
							$config['file_name'] = $_FILES['files']['name'][$i];

							$this->load->library('upload', $config);
							$this->upload->initialize($config);
							if ($this->upload->do_upload('file')) {
								$uploadData = $this->upload->data();
								$filename = $uploadData['file_name'];

								$data['totalFiles'][] = $filename;
							} else {
								$error = array('error' => $this->upload->display_errors());

								$error_message .= "<p class='text-danger'>Sorry, Upload Failed!</p>";
							}
						}

					}

					if ($state && $country) {
						$state = $this->Users->getState($state);
						$country = $this->Users->getCountry($country);

						//Insert Record
						$res1 = $this->Users->create($name, $sales, $country, $state, $city, $invoice, $image, $date);
						if ($res1 === false) {
							// Action Failure
							$error_message .= "<p class='text-danger'>Sorry, validation Failed!</p>";
						} else {

							$error_message .= "<p class='text-success'>Validation successful</p>";

							//			header("Location:".base_url()."app/profile_edit"); exit();
						}
					}
				}
			}
		}


		$data["error_message"] = $error_message;
		$data['geCountries'] = $this->Users->getAllCountries();
		$this->load->view('form', $data);
	}
	public function getstates()
	{
		$json = array();
		$this->Users->setCountryID($this->input->post('countryID'));
		$json = $this->Users->getStates();
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	// get city names
	function getcities()
	{
		$json = array();
		$this->Users->setStateID($this->input->post('stateID'));
		$json = $this->Users->getCities();
		header('Content-Type: application/json');
		echo json_encode($json);
	}



	private function load_auth_libs_etc()
	{
		// Load Database
		$this->load->database();
		// Load Libraries

		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
		// load helper
		$this->load->helper('main_helper');


		$this->load->model('Users');


	}
}
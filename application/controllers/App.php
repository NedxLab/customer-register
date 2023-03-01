<?php
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
		$this->load->view('form');
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
			$name = protect($this->input->post("name"));
			$sales = protect($this->input->post("sales"));
			$country = protect($this->input->post("country"));
			$state = protect($this->input->post("state"));

			$city = protect($this->input->post("city"));
			$invoice = protect($this->input->post("date"));
			$image = protect($this->input->post("image"));
			$date = protect($this->input->post("pdf"));

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


		$data["error_message"] = $error_message;
		$this->load->view('form', $data);
	}

	private function load_auth_libs_etc()
	{
		// Load Database
		$this->load->database();
		// Load Libraries

		$this->load->library('form_validation');

		// load helper
		$this->load->helper('main_helper');


		$this->load->model('Users');


	}
}
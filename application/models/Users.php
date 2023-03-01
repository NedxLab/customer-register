<?php

class Users extends CI_Model
{
	//Constructor
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();

		date_default_timezone_set("Africa/Lagos");
	}
	private $table = "form_info";
	public function create($name, $sales, $country, $state, $city, $invoice, $image, $date)
	{

		$query = array(
			'name' => $name,
			'total_sales' => $sales,
			'country' => $country,
			'state' => $state,
			'city' => $city,
			'invoice' => $invoice,
			'customer_image' => $image,
			"invoice_date" => $date,
			'time_updated' => date("Y-m-d H:i:s"),

		);
		$this->db->insert($this->table, $query);
		return array(true, $this->db->insert_id());
	}

}
?>

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
	private $_countryID;
	private $_stateID;
	private $table = "form_info";

	public function setCountryID($countryID)
	{
		return $this->_countryID = $countryID;
	}
	// set state id
	public function setStateID($stateID)
	{
		return $this->_stateID = $stateID;
	}

	public function getAllCountries()
	{
		$this->db->select(array('c.id as country_id', 'c.slug', 'c.sortname', 'c.name as country'));
		$this->db->from('countries as c');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getStates()
	{
		$this->db->select(array('s.id as state_id', 's.country_id', 's.name as state'));
		$this->db->from('states as s');
		$this->db->where('s.country_id', $this->_countryID);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getCities()
	{
		$this->db->select(array('i.id as city_id', 'i.name as city', 'i.state_id'));
		$this->db->from('cities as i');
		$this->db->where('i.state_id', $this->_stateID);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getCountry($country)
	{

		$this->db->where("id", $country);
		$this->db->from("countries");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array()[0]['name'];
		}
		return false;
	}

	public function getState($state)
	{

		$this->db->where("id", $state);
		$this->db->from("states");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array()[0]['name'];
		}
		return false;
	}
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
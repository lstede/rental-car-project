<?php
include_once('dbExec.php');

class cars extends dbExec

{

	public function addCar($table, $columns) {
		$this->query('insert',$table,$columns);
	}

	public function getAllCars($table) {
		$this->query('select',$table);
		return $this->results;
	}

	public function editCar($table,$columns = null, $extraOptions = null)
	{
		$this->query("update", $table, $columns, $extraOptions);
	}


	public function getCar($table, $carStatusId )
	{
		$extraOptions = array("carStatusId" => $carStatusId);
		$this->query('select', $table , '', $extraOptions);
		return $this->results;
	}

	public function getCarz($table, $carStatusId )
	{
		$extraOptions = array("carColorId" => $carStatusId);
		$this->query('select', $table , '', $extraOptions);
		return $this->results;
	}

	public function getCarTypes($table, $carStatusId )
	{
		$extraOptions = array("carTypesid" => $carStatusId);
		$this->query('select', $table , '', $extraOptions);
		return $this->results;
	}

	public function getCarBrands($table, $carStatusId )
	{
		$extraOptions = array("carBrandsId" => $carStatusId);
		$this->query('select', $table , '', $extraOptions);
		return $this->results;
	}

	public function deleteCar($table, $extraOptions) {
		$this->query('delete', $table, null, $extraOptions);
	}

}












?>


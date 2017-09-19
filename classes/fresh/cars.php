<?php
include_once('dbExec.php');

class cars extends dbExec

{

	public function addCar($columns) {
		$this->query('insert','carstatus',$columns);
	}

	public function getAllCars($table) {
		$this->query('select',$table);
		return $this->results;
	}

	public function editStatus($columns = null, $extraOptions = null)
	{
		$this->query("update", 'carstatus', $columns, $extraOptions);
	}


	public function getCar($carStatusId )
	{
		$extraOptions = array("carStatusId" => $carStatusId);
		$this->query('select', 'carstatus' , '', $extraOptions);
		return $this->results;
	}


	public function deleteCarStatus($extraOptions) {
		$this->query('delete', 'carstatus', null, $extraOptions);
	}

}












?>


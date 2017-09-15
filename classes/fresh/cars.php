<?php
include_once('dbExec.php');

class cars extends dbExec

{

	public function addCar($table,$columns) {
		$this->query('insert',$table,$columns);
	}

	public function getAllCars($table) {
		$this->query('select',$table);
		return $this->results;
	}

	public function deleteCar($table,$columns){
		$this->query('delete',$table,$columns);
	}


}












?>


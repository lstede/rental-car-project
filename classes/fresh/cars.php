<?php
include_once('dbExec.php');

class cars extends dbExec

{

	public function addCar($table, $columns) {
		$this->query('insert',$table,$columns);
	}

    public function getAllCars()
    {
        $columns = array('carId', 'carName', 'carBuildYear', 'carSeats', 'carImage', 'carPrice',
            'carColorName', 'carStatusName', 'carTypesName', 'carBrandsName');

        $extraoptions = array('carbrands' => array('cars.carBrand' => 'cars.carBrand'),
            'carcolor' => array('cars.carColor' => 'carcolor.carColorId'),
            'carstatus' => array('cars.carStatus' => 'carstatus.carStatusId'),
            'cartypes' => array('cars.carType' => 'cartypes.carTypesId')
        );

        $this->query('selectJoin', 'cars', $columns, $extraoptions);
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



    public function getOptions() {
        $carOptions = array();
        $this->query('select','carbrands');
        $carOptions['brands'] = $this->results;
        $this->query('select','carcolor');
        $carOptions['color'] = $this->results;
        $this->query('select','carstatus');
        $carOptions['status'] = $this->results;
        $this->query('select','cartypes');
        $carOptions['types'] = $this->results;
        return $carOptions;
    }

}


?>


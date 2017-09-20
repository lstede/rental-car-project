<?php
include_once('dbExec.php');

class cars extends dbExec

{

    public function addCar($columns)
    {
        $this->query('insert', 'carstatus', $columns);
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

    public function editStatus($columns = null, $extraOptions = null)
    {
        $this->query("update", 'carstatus', $columns, $extraOptions);
    }


    public function getCar($carStatusId)
    {
        $extraOptions = array("carStatusId" => $carStatusId);
        $this->query('select', 'carstatus', '', $extraOptions);
        return $this->results;
    }


    public function deleteCarStatus($extraOptions)
    {
        $this->query('delete', 'carstatus', null, $extraOptions);
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


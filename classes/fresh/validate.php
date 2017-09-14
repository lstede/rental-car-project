<?php
/**
 * Created by PhpStorm.
 * User: Zico
 * Date: 06-Sep-17
 * Time: 14:11
 */

class validate
{

    private $errors;
    protected $succes;

    public function validateInfo($data)
    {


        foreach ($data as $postNames => $rules) {


            foreach ($rules as $singleRule => $value) {
                if (empty($_POST[$postNames]) && $singleRule === 'required') {
                    $this->errors[$postNames] =  " is verplicht";
                } elseif(!empty($_POST[$postNames])) {
                    switch ($singleRule) {
                        case 'min' :
                            if (strlen($_POST[$postNames]) < $rules['min']) {
                                $this->errors[$postNames] =  " heeft minimaal " . $rules['min'] . "letters nodig!";
                            }
                            break;
                        case 'max' :
                            if (strlen($_POST[$postNames]) > $rules['max']) {
                                $this->errors[$postNames] = " mag maximaal" . $rules['max'] . " letters!";
                            }
                            break;
                        case 'match' :
                            if ($_POST[$postNames] != $_POST[$rules['match']]) {
                                $this->errors[$postNames] = "wachtwoorden komen niet met elkaar overheen";
                            }


                            break;
                    }
                }
            }
        }


        if (!empty($this->errors)) {
            //$this->succes = false;
            return false;
        }
        else {
            return true;
        }




    }

    public function showErrors($currentName) {
        if(isset($this->errors)) {
            foreach ($this->errors as $name => $error) {
                if($currentName == $name) {
                    return $error;
                }
            }
        }
    }

    public function returnSucces() {
        return $this->succes;
    }

    public function returnErrors() {
        return $this->errors;
    }

}
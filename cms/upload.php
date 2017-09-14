<?php

class uploadImg {

	public $src = "img/";
	public $tmp;
	public $filename;
	public $typefl;
	public $uploadfile;

	public $type = array("jpg", "JPEG", "png", "gif");

	function __construct() {

		$this->filename = $_FILES["file"]["name"];

		$this->tmp = $_FILES["file"]["name"];

		$this->uploadfile = $this-> src . basename( $this->filename );


	}

	public function filecheck(){
		$this -> typefl = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
		if(in_array($this -> typefl, $this -> type)){


			return true;
		}
		else{
			echo "Bestand is geen afbeelding!";
			return false;
		}
	}

	// 50 staat voor 50 mb
	public function sizecheck(){
		if($_FILES["file"]["size"] < 50*1000000 ){
			return true;

		}


		else{
			echo "Bestandsformaat te groot";
			return false;
		}
	}




	public function uploadfile() {

		if ( move_uploaded_file( $_FILES["file"]["tmp_name"], $this->uploadfile ) ) {
			return true;

		} else {
			return false;

		}
	}




}


?>
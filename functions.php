<?php
	//function.php
	require_once("../configGLOBAL.php");
	$database = "if15_vitamak";

	
	//loome uue funktsioni, et küsida abist andmed
	function getCarData(){
		
		// lisame kasutaja ab'i
		// globals on muutuja kõigist php failidest mis on ühendatud
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
		$stmt->bind_result($id, $user_id, $number_plate, $color_from_db);
		$stmt->execute();
		
		$array = array();
		
		//tee tsüklit nii mitu korda, kui saad
		//abist ühe rea andmed
		
		while($stmt->fetch()){
			
			//loon objekti
			$car = new StdClass();
			$car->uf = $id;
			$car->number_plate = $number_plate;
			
			//lisame selle massive
			array_push($array, $car);
			echo "<pre>";
			var_dump($array);
			echo "</pre>";
			
			//echo $color_from_db." ".$number_plate."<br>";
		}
		
		
		$stmt->close();
		$mysqli->close();
		
		
	}
	
	getCarData();
	
?>
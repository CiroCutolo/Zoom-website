<?php
$action=$_GET['action'];

switch ($action) {
	case "getAnimale":

		$animale=$_GET['animale'];
		$pagina=$animale . ".php";

		include $pagina;
		$returnAnimale = [];
		$returnAnimale["titolo"]=$animaldetails['animal.title'];//titolo[animale];
		$returnAnimale["descrizione"]=$animaldetails['animal.description'] ;


		echo json_encode($returnAnimale);
		break;	
	case "altracosa":
		break;
		
}



/* send a JSON encded array to client */
//header('Content-type: application/json');
//echo json_encode($result_array);

?>


<?php
$action=$_GET['action'];

switch ($action) {
	case "getAnimal":

		$animale=$_GET['animale'];

		include("dettagliAnimali.php");
		$returnAnimale = [];
		$returnAnimale["titolo"]=$titolo[$animale];
		$returnAnimale["descrizione"]=$descrizione[$animale];


		echo json_encode($returnAnimale);
		break;	
	case "altracosa":
		break;
		
}



/* send a JSON encded array to client */
//header('Content-type: application/json');
//echo json_encode($result_array);

?>
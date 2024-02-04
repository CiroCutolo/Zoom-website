<?php
include("connessione.php");
session_start();

$action=$_GET['action'];
switch ($action) {
	case "login":
		$email_form=$_GET['email'];
		$pw_form=$_GET['password'];
		$login="NOK";
		//effettuo la connessione al database e seleziono email e password dalla tabella utenti che sono uguali a email e passowrd inseriti nel form.
		//prelevo anche il valore del nome e del cognome per poi salvarli all'interno di variabili di sessione per monitorare lo stato dell'utente
		$sql = "SELECT email,password,nome,cognome FROM utenti WHERE utenti.email='$email_form'";
		
		//salvo il risultato all'interno della riga restituita dalla quary che sarà sicuramente diversa da flase nel caso in cui trova l'utente
		$ret = pg_query($conn,$sql);
		$row = pg_fetch_row($ret);
		
		//reindirizzo alla pagina precedentemente visitata mostrando un messaggio di successo o insuccesso del login
		if($row != false){
		  $password = $row[1];
		  if(password_verify($pw_form,$password)){
		  //avvio della sessione nel caso in cui il login va a buon fine
			$_SESSION["isLogged"] = $email_form;
  
			$_SESSION["email"] = $row[0];
			$_SESSION["password"] = $row[1];
			$_SESSION["nome"] = $row[2];
			$_SESSION["cognome"] = $row[3];
			
			$login="OK";

		  }
		}
		$retLogin = [];
		$retLogin["stato"]=$login;
		echo json_encode($retLogin);
		break;

	case "getAnimal":
		//fornisce il titolo e la descrizione dell'animale specificato, da inserire poi nel popup
		$animale=$_GET['animale'];

		include("dettagliAnimali.php");
		$returnAnimale = [];
		$returnAnimale["titolo"]=$titolo[$animale];
		$returnAnimale["descrizione"]=$descrizione[$animale];


		echo json_encode($returnAnimale);
		break;	
		
	case "getIsLogged":
		//controlla se l'utente è loggato per poter procedere con l'acquisto dei biglietti
		$strReturn = [];
		if (isset($_SESSION["isLogged"]))
			$strReturn["isLogged"]=$_SESSION["isLogged"];
		else
			$strReturn["isLogged"]="";
		echo json_encode($strReturn);
		break;
				
	case "altracosa":
		break;
		
}

/* send a JSON encded array to client */
//header('Content-type: application/json');
//echo json_encode($result_array);

?>
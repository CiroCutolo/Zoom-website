<?php
    $host = 'localhost';
    $port = '5432';
    $db = 'gruppo22';
    $username = 'www';
    $password = 'tw2024'; //poi deve essere tw2024
    $connection_string = "host = $host port = $port dbname = $db user = $username password = $password"; 
    //echo $connection_string;

    $conn = pg_connect($connection_string)
    or die('Impossibile connettersi al database: ' .preg_last_error());
    //echo "Connessione al database riuscita <br/>";

?>
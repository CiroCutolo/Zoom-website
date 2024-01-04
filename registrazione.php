<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors' ,1);
    error_reporting(E_ALL);

    include("connessione.php"); //connessione al database

    //PERMETTERE ALL'UTENTE DI MODIFICARE I DATI 
    $titolo="REGISTRAZIONE";
    $titoloBottone="Registrati";
    /*$nome="";
    $cognome="";
    $password="";
    $confermaPassword="";
    $email="";
    $data="";

    if(isset($_GET["action"]) && ($_GET["action"] == "modifica")){ //verifico se l'utente vuole modificare dei dati
        $titolo="MODIFICA DATI UTENTE";
        $titoloBottone="Aggiorna";

        //cerca nel database tutti i campi corrispondenti all'email dell'utente 
        $tmpQuery = "SELECT * FROM utenti WHERE email = '".$_GET["email"]."'";
        $result = pg_query($conn, $tmpQuery);

        //scorre tutti i campi della linea dell'utente e li inserisce nel form, di modo che modifica solo quello desiderato
        while($row = pg_fetch_row($result)){
            $nome = $row[0];
            $cognome = $row[1];
            $email = $row[2];
            $password = $row[3];
            $confermaPassword = $row[3];
            $eta = $row[4];
        }


    }*/

    //PRELEVARE I DATI DELL'UTENTE DAL FORM E INSERIRLI NEL DATABASE
    if(isset($_GET["action"]) && ($_GET["action"] == "registra")){ //verifico se il form è stato completato

        //prelevo tutti i dati inseriti dall'utente
        $nome = pg_escape_literal($conn,$_POST["nome"]);
        $cognome = pg_escape_literal($conn,$_POST["cognome"]); //sostituisce i caratteri speciali per poterli inserire
        $password = pg_escape_literal($conn,$_POST["password"]);
        $email =pg_escape_literal($conn,$_POST["email"]);
        $data = $_POST["data_di_nascita"];

        //calcolo l'età
        $oggi = date("Y-m-d");
        $eta = (date("Y")-date("Y",strtotime($data)));


        //controlla quanti utenti con l'email prelevata dal form sono presenti(se più di 0, significa che l'utente è già registrato)
        $tmpQuery = "SELECT nome FROM utenti WHERE email = '".$_POST["email"]."'";
        $result = pg_query($conn, $tmpQuery);

        if($result > 0){
            $utenteEsistente = true;  
        }
        else{
            //inserisco i dati nel database
            $query = "INSERT INTO utenti (nome, cognome, password, email, età) VALUES ($nome, $cognome, $password, $email, $eta)";
            //esegue la query, inserendo i dati
            $result = pg_query($conn, $query);     
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registrazione</title>
        <meta charset="utf-8">
        <meta name="author" content="Aurora Campione">
        <meta name="description" content="pagina di registrazione">
        <link rel="stylesheet" href="registrazione.css?<?php echo rand();?>" type="text/css">

        <script type = "text/javascript">

            function controllaLunghezza(campo,len){
                switch(campo.id){
                    case "password":
                        if(campo.value.length < len){
                            alert(campo.id + ": inserire almeno " + len + " caratteri");
                            campo.focus();
                            return false;
                        }
                        return true;
                        break;
                    case "nome":
                        if(campo.value.length > len){
                            alert(campo.id + ": inserire al massimo " + len + " caratteri");                         
                            campo.focus();
                            return false;
                        }
                        return true;
                        break;

                    case "cognome":
                    if(campo.value.length > len){
                        alert(campo.id + ": inserire al massimo " + len + " caratteri");                         
                        campo.focus();
                        return false;
                    }
                    return true;
                    break;
                }
            }

            function controllaPassword(pass2, pass1){
                if(pass2.value != pass1.value){
                    alert("Le password inserite non corrispondono");
                    pass2.focus();
                    return false;
                }
                return true;
            }

            function controllaForm(){
                res = controllaLunghezza(document.getElementById("nome"),15);
                if(res){
                    res = controllaLunghezza(document.getElementById("cognome"),15);

                }
                if(res){
                    res = controllaLunghezza(document.getElementById("password"),6);
                }
                if(res){
                    res = controllaPassword(document.getElementById("conferma_password"),document.getElementById("password"));
                }

            }

            <?php if ($utenteEsistente) { ?>
                    alert("Esiste già un utente con l'email: <?php echo $_POST["email"] ?>");
                <?php } ?>
 
        </script>

    </head>

    <body>
    <?php include 'header.html';?>

    <form id = "form" action="registrazione.php?action=registra" method="POST" autocomplete="off" enctype="application/x-www-form-urlencoded">
        <div style = "text-align:center">
            <h1> <?php echo $titolo;?> </h1>
            <br/>
            <br><br>
            <input type="text" id="nome" name = "nome" placeholder="Nome" required>
            <input type="text" id="cognome" name = "cognome" placeholder="Cognome" required>
            <br><br>

            <input type="date" id="data_di_nascita" name = "data_di_nascita" max="<?php echo date('Y-m-d');?>" required>
            <input type="email" id="email" name = "email" placeholder="Email" required>
            <br><br>

            <input type="password" id="password" name = "password" placeholder="Password" required>
            <input type="password" id="conferma_password" name = "conferma_password" placeholder="Conferma password" required>
            <br><br>

            <input type="submit" id="registrati" value="<?php echo $titoloBottone;?>" onclick = "controllaForm()">
        </div>

    
    </form>


    </body>
    
</html>
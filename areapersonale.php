<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors' ,1);
    error_reporting(E_ALL);

    include("connessione.php"); //connessione al database
    
    //if (isset(($_SESSION["isLogged"])) && $_SESSION["isLogged"]=="") //se la sessione è aperta, ma l'utente non ha fatto il login
        //header('Location: /home.php'); 

    $_SESSION["isLogged"]="auroracampione@gmail.com";

    if(!isset($_SESSION["isLogged"])){
        header('Location: /home.php');
    }

    $nome="";
    $cognome="";
    $password="";
    $email="";
    $data="";
    $utenteEsistente = false;




    //PRELEVARE I DATI MODIFICATI DALL'UTENTE NEL FORM PER INSERIRLI NEL DATABASE
    if(isset($_GET["action"]) && ($_GET["action"] == "modifica")){ //verifico se il form è stato completato

        //prelevo tutti i dati dal form
        $Nome = pg_escape_literal($conn,$_POST["nome"]);
        $Cognome = pg_escape_literal($conn,$_POST["cognome"]); //sostituisce i caratteri speciali per poterli inserire

        $passwordCriptata = password_hash($_POST["Password"], PASSWORD_DEFAULT); //cripto la password

        $Password = pg_escape_literal($conn,$passwordCriptata);

        $Email =pg_escape_literal($conn,$_POST["Email"]);
        $Data = $_POST["data_di_nascita"];

        $tmpQuery = "SELECT email FROM utenti WHERE email = '". $_SESSION["isLogged"] ."'"; //seleziona l'email dell'utente che si trova nell'area personale, la quale è quella collegata alla sessione
        $result = pg_query($conn,$tmpQuery); //salva nella prima colonna l'email selezionata

        while($row = pg_fetch_row($result)){ //scorre le righe di result
            $oldEmail = $row[0]; //salva in oldEmail l'email selezionata precedentemente, per controllare poi se l'utente la cambia inserendone una già esistente
        }

        //controlla quanti utenti con l'email prelevata dal form sono presenti(se più di 0, significa che l'utente è già esistente)
        $tmpQuery = "SELECT COUNT (nome) AS numero FROM utenti WHERE email = '". $_POST["Email"] ."'"; //conta gli utenti
        $result = pg_query($conn,$tmpQuery); //salva nella prima colonna il numero di utenti presenti con l'email specificata

        while($row = pg_fetch_row($result)){ 
            $num = $row[0]; //recupera il primo campo della colonna, quindi il numero di utenti presenti con l'email specificata
        }

        if($num > 0 && $oldEmail!=$_POST["Email"]){ //controlla se l'utente ha modificato la sua email inserendone una già esistente
            $utenteEsistente = true;  
        }
        else{
            //inserisco i dati aggiornati nel database
            $query = "UPDATE utenti SET nome=$Nome, cognome=$Cognome, password=$Password, email=$Email, data_di_nascita='$Data' WHERE email = '".  $_SESSION["isLogged"] ."'";

            $result = pg_query($conn, $query); //viene eseguita la query e i dati sono stati aggiornati correttamente: l'utente può visionarli aggiornati nell'area personale 
        }
    }

    //cerca nel database tutti i campi corrispondenti all'email dell'utente 
    $tmpQuery = "SELECT * FROM utenti WHERE email = '".     $_SESSION["isLogged"] ."'";
    $result = pg_query($conn, $tmpQuery);

    //scorre tutti i campi della linea dell'utente e li inserisce nel form
    while($row = pg_fetch_row($result)){
        $nome = $row[0];
        $cognome = $row[1];
        $email = $row[2];
        $password = $row[3];
        $data =  date_format(date_create($row[4]),"d-m-Y"); ;
    }

    ?>

    <!DOCTYPE html>
<html>
    <head>
        <title>Area Personale</title>
        <meta charset="utf-8">
        <meta name="author" content="Aurora Campione">
        <meta name="description" content="pagina di registrazione">
        <link rel="stylesheet" href="areapersonale.css?<?php echo rand();?>" type="text/css">

    </head>

    <body>
    <?php include 'header.php';?>

    <hr size="2" color="black" noshade text-sh>

    <div style = "text-align:center">
        <br>
        <button id="dati" onclick="mostraDati()">I tuoi dati</button>
        <button id="storico" onclick="mostraAcquisti()">I tuoi acquisti</button>
        <div id="mostra_dati" class="visibile" >
            <br><br>
            <div>Ecco i dati del tuo account: è possibile modificarli selezionando i campi interessati</div>
            <form onsubmit = "return controllaForm()" id = "form" nome= "form" action="areapersonale.php?action=modifica" method="POST" autocomplete="off" enctype="application/x-www-form-urlencoded">
                <div style = "text-align:center">        
                    <span>Nome: </span><input type="text" id="nome" name = "nome" placeholder="Nome" value="<?php echo $nome?>" onchange="abilita()" onkeyup="abilita()">
                    <br><br>
                    <span>Cognome: </span><input type="text" id="cognome" name = "cognome" placeholder="Cognome" value="<?php echo $cognome?>" onchange="abilita()" onkeyup="abilita()">
                    <br><br>

                    <span>Data di nascita: </span><input type="text" id="data_di_nascita" name = "data_di_nascita" max="<?php echo date('Y-m-d');?>"  value="<?php echo $data?>" onchange="abilita()" onkeyup="abilita()">
                    <br><br>
                    <span>Email: </span><input type="text" id="Email" name = "Email" placeholder="E-mail"  value="<?php echo $email?>" onchange="abilita()" onkeyup="abilita()">
                    <br><br>
        
                    <span>Password: </span><input type="password" id="Password" name = "Password" placeholder="Imposta una nuova password">
                        <i class="far fa-eye-slash" id="togglePassword"></i>
                    <br><br>
                    <input type="submit" id="registrati" value="Aggiorna dati" disabled>
                </div>
        
            
            </form>

        </div>

        <div id="mostra_acquisti" class="nascosto" >

            <div style = "text-align:center; overflow-y: auto; height: 80%;">
                <table>
                    <tr><th>CODICE BIGLIETTO</th><th>DATA DI ACQUISTO</th><th>PREZZO</th><th>TIPOLOGIA</th></tr>
                <?php
                    //PRELEVO I BIGLIETTI ACQUISTATI 
                    //cerca nel database tutti i biglietti corrispondenti all'email dell'utente 
                    $tmpQuery = "SELECT codice_biglietto, data, prezzo, tipologia FROM biglietti_acquistati A INNER JOIN biglietti B ON A.codice_biglietto = B.codice WHERE utente = '".     $_SESSION["isLogged"] ."'";
                    $result = pg_query($conn, $tmpQuery);

                    //scorre tutti i campi della linea del biglietto indicato e li inserisce nelle righe della tabella
                    while($row = pg_fetch_row($result)){
                        $codiceBiglietto = $row[0];
                        $data =  date_format(date_create($row[1]),"d-m-Y"); //inverte la data
                        $prezzo = $row[2]; 
                        $tipologia = $row[3]; ?>

                        <tr><td><?php echo $codiceBiglietto?></td><td><?php echo $data?></td><td><?php echo $prezzo?></td><td><?php echo $tipologia?></td></tr>

                    <?php }
                    

                    ?>
                </table>
            </div>
        </div>
        <br>
        <button id="logout" onclick="logout()">Esci</button onclick="esci()">
    </div>


    <script type="text/javascript">
        function mostraDati(){
            divDati=document.getElementById("mostra_dati");
            divAcquisti=document.getElementById("mostra_acquisti");
            divDati.className="visibile";
            divAcquisti.className="nascosto";
        }
        function mostraAcquisti(){
            divDati=document.getElementById("mostra_dati");
            divAcquisti=document.getElementById("mostra_acquisti");
            divDati.className="nascosto";
            divAcquisti.className="visibile";
        }



        function abilita(){
            
            if((document.getElementById("nome").value == "") || (document.getElementById("cognome").value == "") || (document.getElementById("data_di_nascita").value == "")
                || (document.getElementById("Email").value == "")){
                    
                    document.getElementById("registrati").setAttribute('disabled', '');

            }
            else{
                document.getElementById("registrati").removeAttribute('disabled');
            }
        }

        function controllaLunghezza(campo,len){
            switch(campo.id){
                case "Password":
                    if(campo.value.length < len && campo.value!=""){
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


        function controllaForm(){
            res = controllaLunghezza(document.getElementById("nome"),15);
            if(res){
                res = controllaLunghezza(document.getElementById("cognome"),15);
            }
            if(res){
                res = controllaLunghezza(document.getElementById("Password"),6);
            }
            return res;
        }

        <?php if ($utenteEsistente) { ?>
                alert("Esiste già un utente con l'email: <?php echo $_POST["Email"] ?>");
        <?php } ?>

        //creo l'azione mostra/nascondi password
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("Password");


        //perl la password    
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.classList.toggle('fa-eye');
        });

        abilita();

        function esci(){
            $_SESSION["isLogged"]="";
            <?php
                session_destroy();
            ?>

            header('Location: /home.php'); 
        }
    </script>

    </body>
    
</html>
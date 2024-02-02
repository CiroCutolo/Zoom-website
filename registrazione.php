<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors' ,1);
    error_reporting(E_ALL);

    include("connessione.php"); //connessione al database
    session_start();

    $_SESSION["isLogged"]=""; // VARIABILE DI SESSIONE PER INDICARE UTENTE LOGGATO
    $utenteEsistente = false;

    $nome="";
    $cognome="";
    $password="";
    $confermaPassword="";
    $email="";
    $data="";

    //PRELEVARE I DATI DELL'UTENTE DAL FORM E INSERIRLI NEL DATABASE
    if(isset($_GET["action"]) && ($_GET["action"] == "registra")){ //verifico se il form è stato completato
    
        //prelevo tutti i dati inseriti dall'utente
        $Nome = pg_escape_literal($conn,$_POST["nome"]);
        $Cognome = pg_escape_literal($conn,$_POST["cognome"]); //sostituisce i caratteri speciali per poterli inserire

        $passwordCriptata = password_hash($_POST["Password"], PASSWORD_DEFAULT); //cripta la password

        $Password = pg_escape_literal($conn,$passwordCriptata);
        $Email =pg_escape_literal($conn,$_POST["Email"]);
        $Data = $_POST["data_di_nascita"];

        

        //controlla quanti utenti con l'email prelevata dal form sono presenti(se più di 0, significa che l'utente è già registrato)
        $tmpQuery = "SELECT COUNT (nome) AS numero FROM utenti WHERE email = '".$_POST["Email"]."'";
        $result = pg_query($conn,$tmpQuery); //salva nella prima colonna il numero di utenti presenti con l'email specificata

        while($row = pg_fetch_row($result)){
            $num = $row[0]; //recupera il primo campo della colonna, quindi il numero di utenti presenti
        }

        $url = $_GET['paginaSorgente']; //preleva il valore della pagina che ha chiamato la registrazione

        if($num > 0){ //controlla se è gia presente un utente con la stessa email
            $utenteEsistente = true;  
        }
        else{
            //inserisco i dati nel database
            $query = "INSERT INTO utenti (nome, cognome, password, email, data_di_nascita) VALUES ($Nome, $Cognome, $Password, $Email, '$Data')";
            //esegue la query, inserendo i dati
            $result = pg_query($conn, $query);   
            $_SESSION["isLogged"]= $Email; //UTENTE REGISTRATO E' ANCHE LOGGATO, SI AVVIA LA SESSIONE?>
            <script>
                window.location.href='<?php echo $url?>';
                //ritorna alla pagina che ha chiamato la registrazione
            </script>
        <?php }
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

    </head>

    <body>
    <?php include 'header.php';?>
		
    <div class="leopardo">	
        <form onsubmit = "return controllaForm()" id = "form" nome= "form" action="registrazione.php?action=registra&paginaSorgente=<?php echo $_GET['paginaSorgente']?>" method="POST" autocomplete="off" enctype="application/x-www-form-urlencoded">
        
            <div id="scritta">
                <h1>Registrazione</h1>
                <div id="campi_obbligatori"><b>Inserisci TUTTI i campi per poter procedere alla registrazione.</b> </div>
            </div>    
            <br>
            <input type="text" id="nome" name = "nome" placeholder="Nome" value="<?php echo $nome?>" onchange="abilita()" onkeyup="abilita()">
            <input type="text" id="cognome" name = "cognome" placeholder="Cognome" value="<?php echo $cognome?>" onchange="abilita()" onkeyup="abilita()">
            <br><br>

            <input type="date" id="data_di_nascita" name = "data_di_nascita" max="<?php echo date('Y-m-d');?>"  value="<?php echo $data?>" onchange="abilita()" onkeyup="abilita()">
            <input type="email" id="Email" name = "Email" placeholder="E-mail"  value="<?php echo $email?>" onchange="abilita()" onkeyup="abilita()">
            <br><br>
            <div id="passwordCONocchio">
                <input type="password" id="Password" name = "Password" placeholder="Password" value="<?php echo $password?>" onchange="abilita()" onkeyup="abilita()">
                <i class="far fa-eye-slash" id="togglePassword"></i>
            </div>
            <div id="confermapasswordCONocchio">
                <input type="password" id="conferma_password" name = "conferma_password" placeholder="Conferma password" value="<?php echo $confermaPassword?>" onchange="abilita()" onkeyup="abilita()">
                <i class="far fa-eye-slash" id="togglePassword1"></i>
            </div>
            <br>
            <input type="submit" id="registrati" value="Registrati" disabled>
        </form>
    </div>

    <?php include 'footer.php';?>
   
    <script type = "text/javascript">

        function abilita(){ //abilita il submit solo se sono stati inseriti tutti i campi
            
            if((document.getElementById("nome").value == "") || (document.getElementById("cognome").value == "") || (document.getElementById("data_di_nascita").value == "")
                || (document.getElementById("Email").value == "") || (document.getElementById("Password").value == "") || (document.getElementById("conferma_password").value == "")){
                    
                    document.getElementById("registrati").setAttribute('disabled', '');

            }
            else{
                document.getElementById("registrati").removeAttribute('disabled');
            }
        }

        function controllaLunghezza(campo,len){
            switch(campo.id){
                case "Password":
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
                res = controllaLunghezza(document.getElementById("Password"),6);
            }
            if(res){
                res = controllaPassword(document.getElementById("conferma_password"),document.getElementById("Password"));
            }
            return res;
        }

        <?php if ($utenteEsistente) { ?>
                alert("Esiste già un utente con l'email: <?php echo $_POST["Email"] ?>");
        <?php } ?>

        //creo l'azione mostra/nascondi password
        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("Password");

        const togglePassword1 = document.getElementById("togglePassword1");
        const password1 = document.getElementById("conferma_password");

        //perl la password    
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.classList.toggle('fa-eye');
        });

        //per conferma password
        togglePassword1.addEventListener('click', function () {
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);

            this.classList.toggle('fa-eye');
        });
</script>

    </body>
    
</html>
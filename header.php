<?php
    include("connessione.php");

    session_start();

    if(isset($_GET["action"]) && ($_GET["action"] == "accedi") && (isset($_SESSION["registrato"]) && $_SESSION["registrato"]!="1")){ //entra solo tramite il login dal popup
      $email_form=$_POST['email'];
      $pw_form=$_POST['pw'];
      //effettuo la connessione al database e seleziono email e password dalla tabella utenti che sono uguali a email e passowrd inseriti nel form.
      //prelevo anche il valore del nome e del cognome per poi salvarli all'interno di variabili di sessione per monitorare lo stato dell'utente
      $sql = "SELECT email,password,nome,cognome FROM utenti WHERE utenti.email='$email_form'";
      
      //salvo il risultato all'interno della riga restituita dalla quary che sarà sicuramente diversa da flase nel caso in cui trova l'utente
      $ret = pg_query($conn,$sql);
      $row = pg_fetch_row($ret);
      
      //reindirizzo alla pagina precedentemente visitata mostrando un messaggio di successo o insuccesso del login
      $url = $_SERVER['HTTP_REFERER'];
      if($row != false){
        $password = $row[1];
        if(password_verify($pw_form,$password)){
        //avvio della sessione nel caso in cui il login va a buon fine
          $_SESSION["isLogged"] = $email_form;

          $_SESSION["email"] = $row[0];
          $_SESSION["password"] = $row[1];
          $_SESSION["nome"] = $row[2];
          $_SESSION["cognome"] = $row[3];
          
          //nel caso in cui provo ad effettuare il login nella pagina in cui mi posso registrare, vengo reindirizzato alla home
          if(str_contains($url,'registrazione.php')){
            echo "<script>
            alert('Login avvenuto con successo!');
            window.location.href='home.php';
            </script>";
          }else{
            echo "<script>
            alert('Login avvenuto con successo!');
            window.location.href='$url';
            </script>";
          }
        }else{
        echo "<script>
        alert('Password o email errate!');
        window.location.href='$url';
        </script>";
        }
      }
    }else if((isset($_SESSION["registrato"]) && $_SESSION["registrato"]=="1")){ //entra solo tramite la registrazione
      $em = $_SESSION["isLogged"];
      $sql = "SELECT email,nome,cognome FROM utenti WHERE utenti.email='$em'";
      $ret = pg_query($conn,$sql);
      $row = pg_fetch_row($ret);
      $_SESSION["email"] = $row[0];
      $_SESSION["nome"] = $row[1];
      $_SESSION["cognome"] = $row[2];
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/9491817803.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="header.css?<?php echo rand();?>">
    <title>Header - Zoom</title>
  </head>
  <body id="body">
    <div class="header navigation-bar">
      <input type="checkbox" id="check">
      <label for="check">
        <span class="fas fa-bars" id="btn" onclick="bloccascroll()"></span>
        <span class="fas fa-times" id="cancel" onclick="sbloccascroll()"></span>
      </label>
      <script>
        function bloccascroll(){
          document.getElementById("body").classList.add("lock");
        }
        function sbloccascroll(){
          document.getElementById("body").classList.remove("lock");
        }
      </script>
      <a name="home">
      <img class="logo" src="img\logo-removebg.png">
      </a>
      <ul>
        <li class="text"><a href="home.php">Home</a></li>
        <li class="text"><a href="Animali.php">Animali</a></li>
        <li class="text"><a href="acquistobiglietti.php">Acquisto biglietti</a></li>
        <button class="dropbtn" onclick="menutendina()"></button>
        <div class="dropdown-content" id="myDropdown">
          <div class="contenitore-info">
            <div class="logo-iniziali"> <div class="iniziali"><?php echo mb_substr($_SESSION["nome"],0,1) . mb_substr($_SESSION["cognome"],0,1) ?></div></div>
            <div class="info-utente"><h3><?php echo $_SESSION["nome"] . " " . $_SESSION["cognome"] ?></h3><?php echo $_SESSION["email"] ?></div>
          </div>
          <div class="lineaOmbra"></div>
          <a href="areapersonale.php">Area Personale</a>
          <a onclick="esci_menu()">Esci</a>
        </div>
      </ul>
    </div>
    <!--Popup utilizzato per il login e per la registrazione dei nuovi utenti. Non viene visualizzato nel caso in cui viene effettuato il login poichè 
    è sostituito con un menu a tendina che permette di tenere monitorato l'utente. -->
    <div class="popup">
      <button id="close-btn" onclick="chiudipopup()"><span class="fas fa-times"></span></button>
      <div class = "form">
        <h2>Accedi</h2>
        <form action="home.php?action=accedi" method="post">
          <div class="form-element">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Inserisci email" onchange="abilitalogin()" onkeyup="abilitalogin()">
          </div>
          <div class="form-element">
            <label for="password">Password</label>
            <input type="password" id="password" name="pw" placeholder="Inserisci password" onchange="abilitalogin()" onkeyup="abilitalogin()">
          </div>
          <div class="button-container">
            <div class="button-section">
              <div class="form-element" id="login">
                <input id="login-btn" type="submit" value="Accedi" disabled>
              </div>
            </div>
            <div class="button-section">
              <div class="form-element" id="signin">
                <a href="registrazione.php?paginaSorgente=<?php echo $_SERVER['REQUEST_URI']?>">
                <button type="button">Registrati</button>
                </a>
              </div>
            </div>
          </div>
        </form>
          <script>
            function abilitalogin(){
              if (document.getElementById("email").value == "" || document.getElementById("password").value == ""){
                document.getElementById("login-btn").setAttribute('disabled',"");
              }else{
                document.getElementById("login-btn").removeAttribute('disabled');
              }
            }
          </script>
        </div>
      </div>
    </div>

    <script>
      var popup = document.getElementsByClassName("popup");
      /* Quando l'utente clicca il bottone dell'icona dell'account compare il menu a tendina nel caso sia stato effettuato l'accesso, in caso
      contrario compare il popup che permette la registrazione o il login */
      function menutendina() {
        <?php if((!isset($_SESSION["isLogged"])) || ($_SESSION["isLogged"] == "")) { ?>
                popup[0].classList.add("activate");
            <?php }else{ ?>
                document.getElementById("myDropdown").classList.toggle("show");
            <?php } ?>
      }

      function chiudipopup(){
                popup[0].classList.remove("activate"); 
      }

      /* Se clicco un altro punto dello schermo la tendina si disattiva */
      window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
          var myDropdown = document.getElementById("myDropdown");
          if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
          }
        }
      }   

      function esci_menu() {
      window.location.href= 'home.php?action=logout';
      }

    </script>

    <div class="lineaOmbra"></div>

  </body>
</html>

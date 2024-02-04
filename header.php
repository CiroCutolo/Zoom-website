<?php
    include("connessione.php");

    session_start();

    if((isset($_SESSION["entra"]) && $_SESSION["entra"]=="1")){ //entra solo tramite la registrazione per salvare le info dell'utente per il menu a tendina
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
    <script src="https://code.jquery.com/jquery-latest.min.js?<?php echo rand();?>"></script>
    <link rel="stylesheet" href="header.css?<?php echo rand();?>">
    <title>Header - Zoom </title>
  </head>

  <body id="body">
    <div class="header navigation-bar">
      <input type="checkbox" id="check">
      <label for="check">
        <span class="fas fa-bars" id="btn" onclick="bloccascroll()"></span>
        <span class="fas fa-times" id="cancel" onclick="sbloccascroll()"></span>
      </label>
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
        <form id = "frmPopup">
          <div class="form-element">
            <label for="email">Email</label>
            <input onfocus="onFocus()" type="text" id="email" name="email" placeholder="Inserisci email">
          </div>
          <div class="form-element">
            <label for="password">Password</label>
            <div class="occhietto">
              <input onfocus="onFocus()"  type="password" id="password" name="pw" placeholder="Inserisci password">
              <input type="button" id="occhio" onclick="clickOcchio()"><i class="far fa-eye-slash" id="togglepassword"></i></button>
            </div>
          </div>
          <div class="form-element">
            <div id="messaggio" style="display:none; color: red;"></div>
          </div>
          <div class="button-container">
            <div class="button-section">
              <div class="form-element" id="login">
                <input id="login-btn" type="button" onclick="checkLogin()" value="Accedi">
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
        </div>
      </div>
    </div>
    <div class="lineaOmbra"></div>

    <script>
      function login(mail,pwd) { //chiamata ad ajax per controllare le credenziali inserite dall'utente
        var strReturn;
        $.ajax({
            url: "ajax.php?action=login&email="+mail + "&password=" + pwd, dataType: "json", success: function(data) {
            strReturn=JSON.parse(JSON.stringify(data));
              },
              async:false
          });
          return strReturn;	
        }

      var path = window.location.pathname;

      function checkLogin(){ //azioni conseguenti al login andato a buon fine o errato 
        mail=document.getElementById("email").value;
        pwd=document.getElementById("password").value;
        cklog=login(mail,pwd); //salva il risultato della chiamata ajax 

        if (document.getElementById("email").value == "" || document.getElementById("password").value == ""){ //controlla se i campi sono vuoti
          mess=document.getElementById("messaggio");
          mess.style.display="block";
          mess.innerHTML="<div style='width: 100%; text-align: center;'>Inserisci tutti i campi!</div>";
        }else if (cklog.stato=="OK") { //login andato a buon fine, ritorna alla home
          if (window.location.pathname!="/acquistobiglietti.php"){
            window.location.href='home.php';
          }
          else{ 
            popup[0].classList.remove("activate"); 
            window.location.reload(); 
          }

        }else if(cklog.stato="NOK"){ //login errato
          obj=document.getElementById("messaggio");
          obj.style.display="block";
          obj.innerHTML="<div style='width: 100%; text-align: center;'>Password o email errate!</div>";
          //mostra un messaggio di errore se le credenziali sono errate 
        }
      }

      function onFocus() { //elimina il messaggio di errore delle credenziali se ci si sposta su uno dei campi 
          obj=document.getElementById("messaggio");
          obj.style.display="none";
          obj.innerHTML="<div style='width: 100%; text-align: center;'></div>";
      }

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

      function bloccascroll(){
        document.getElementById("body").classList.add("lock");
      }
      function sbloccascroll(){
        document.getElementById("body").classList.remove("lock");
      }
      
      function clickOcchio(){
        alert(0);
        //creo l'azione mostra/nascondi password
        const togglepassword = document.getElementById("togglepassword");
        const Password = document.getElementById("password");
        
        const type = Password.getAttribute('type') === 'password' ? 'text' : 'password';
        Password.setAttribute('type', type);

        //this.classList.toggle('fa-eye');
      }

    </script>
  </body>
</html>

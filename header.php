<?php
    include("connessione.php");

    session_start();

    if(isset($_GET["action"]) && ($_GET["action"] == "accedi")){
      $email_form=$_POST['email'];
      $pw_form=$_POST['pw'];
      //effettuo la connessione al database e seleziono email e password dalla tabella utenti che sono uguali a email e passowrd inseriti nel form
      $sql = "SELECT email,password FROM utenti WHERE utenti.email='$email_form' and utenti.password='$pw_form' ";
      //salvo il risultato all'intero della riga restituita dalla quary che sarà sicuramente diversa da flase nel caso in cui trova l'utente
      $ret = pg_query($conn,$sql);
      $row = pg_fetch_row($ret);
      
      //reindirizzo alla pagina precedentemente visitata mostrando un messaggio di successo o insuccesso del login
      $url = $_SERVER['HTTP_REFERER'];
      if($row != false){
        //avvio della sessione nel caso in cui il login va a buon fine
        $_SESSION["isLogged"] = $email_form;
        echo "<script>
        alert('Login avvenuto con successo!');
        window.location.href='$url';
        </script>";
      }else{
        echo "<script>
        alert('Password o email errate!');
        window.location.href='$url';
        </script>";
      }

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
  <body>
    <div class="header navigation-bar">
      <input type="checkbox" id="check">
      <label for="check">
        <span class="fas fa-bars" id="btn"></span>
        <span class="fas fa-times" id="cancel"></span>
      </label>
      <img class="logo" src="logo-removebg.png">
      <ul>
        <li class="text"><a href="home.php">Home</a></li>
        <li class="text"><a href="Animali.php">Animali</a></li>
        <li class="text"><a href="acquistobiglietti.php">Acquisto biglietti</a></li>
        <button class="dropbtn" onclick="menutendina()"><li class="image"><a><img src="user_icon.png"></a></li><i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content" id="myDropdown">
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </ul>
    </div>

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
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function menutendina() {
      <?php if((!isset($_SESSION["isLogged"])) || ($_SESSION["isLogged"] == "")) { ?>
              var popup = document.getElementsByClassName("popup");
              popup[0].classList.add("activate");
          <?php }else{ ?>
              document.getElementById("myDropdown").classList.toggle("show");
          <?php } ?>
    }

    function chiudipopup(){
              popup[0].classList.remove("activate"); 
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
    }
  }
</script>
    <div class="lineaOmbra"></div>

  </body>
</html>

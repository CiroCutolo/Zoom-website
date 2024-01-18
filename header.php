<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/9491817803.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="header.css">
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
        <li class="text"><a href="#">Home</a></li>
        <li class="text"><a href="#">Animali</a></li>
        <li class="text"><a href="#">Acquisto biglietti</a></li>
        <button id="show-login"><li class="image"><a><img src="user_icon.png"></a></li></button>
      </ul>
    </div>

    <div class = "popup">
      <button id="close-btn"><span class="fas fa-times"></span></button>
      <div class = "form">
        <h2>Accedi</h2>
        <div class="form-element">
          <label for="email">Email</label>
          <input type="text" id="email" placeholder="Inserisci email">
        </div>
        <div class="form-element">
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="Inserisci password">
        </div>
        <div class="button-container">
          <div class="button-section">
            <div class="form-element" id="login">
            <a href="#">
              <button>Accedi</button>
            </a>
          </div>
        </div>
          <div class="button-section">
            <div class="form-element" id="signin">
              <a href="#">
              <button>Registrati</button>
            </a>
            </div>
          </div>

          <script>
            document.querySelector("#show-login").addEventListener("click",function(){
              document.querySelector(".popup").classList.add("activete");
            });

            document.querySelector(".popup #close-btn").addEventListener("click",function(){
              document.querySelector(".popup").classList.remove("activete");
            });


            </script>

        </div>
      </div>
    </div>

  </body>
</html>

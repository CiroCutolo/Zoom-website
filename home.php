<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="header.css">
    <title>Home</title>
  </head>
  <body>
    <?php include 'header.php';?>
    <?php include 'slider.php';?>
    <?php include 'header-part.php';?>
    <?php include 'footer.php';?>
  </body>
</html>

<?php
if(isset($_GET["action"]) && ($_GET["action"] == "logout")){ //verifico se il form è stato completato
  session_destroy();
  session_unset()?>
  <script>

      eraseCookie("numeroInteri");
      eraseCookie("numeroRidotti");
      eraseCookie("datePicker");

      window.location.href= 'home.php';
  </script>
<?php }?>
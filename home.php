

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="header.css">
    <title>Home</title>
  </head>
  <body>
    <?php include 'header.php';?>
    <?php include 'slider.html';?>
    <?php include 'header-part.php';?>
  </body>
</html>

<?php
if(isset($_GET["action"]) && ($_GET["action"] == "logout")){ //verifico se il form è stato completato
  session_destroy();?>
  <script>
    window.location.href='/home.php';
  </script>
<?php }?>
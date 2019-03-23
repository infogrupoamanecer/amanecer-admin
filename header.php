<?php
require_once('/home/amanecer/public_html/wp-load.php');
 if (!is_user_logged_in() ) {
    echo "no sesion" ;
  die("");
 }
require_once('conexion.php'); 
// Silence is golden.
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<img src="images/logo.jpg" width=250>
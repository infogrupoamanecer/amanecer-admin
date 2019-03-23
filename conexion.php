<?php
 $mysqli = new mysqli("localhost", "amanecer_amanece", "F7e610e1_","amanecer_amanecer");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


<?php

session_start();
session_destroy();


//Redirigir al lógin
header("Location: index.php");
exit;

?>
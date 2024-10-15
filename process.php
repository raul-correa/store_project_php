<?php
require 'db.php';
session_start();

//Obtenemos los datos enviados a través del FORM con POST
$user = $_POST["user"];
$pass = $_POST["pass"];

//Creamos consulta con el password y contraseña
$sql = "SELECT user, password FROM users WHERE user = '$user' AND password = '$pass'";
$result = $conn->query($sql);

if($result->num_rows>0){
    //verificar contraseña
    $_SESSION["user"] = $user;
    header("Location: welcome.php");
    exit;
}else{
    $_SESSION["error"] = "El usuario y/o la contraseña son incorrectas";
    header("Location: login.php");
    exit;
}

$conn->close();

?>

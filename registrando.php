<?php
require 'db.php';
session_start();

//Obtenemos los datos enviados a través del FORM con POST
$user = $_POST["user"];
$email = $_POST["email"];
$pass = $_POST["pass"];

//Verificar si el correo y el usuario existe
$sqlVerificar = "SELECT * FROM users WHERE user='$user' OR email='$email'";
$resultVerificar = $conn->query($sqlVerificar);

if($resultVerificar->num_rows >  0){
    //Ya hay un usuario
    echo "
    <script>
    alert('El usuario o el correo ingresado ya se encuentran registrados');
    window.location.href='registro.php';
    </script>
    ";
}else{
    //Nuevo usuario
    $sqlInsertar = "INSERT INTO users (user, email, password) VALUES ('$user','$email','$pass')";
    $resultadoInsertar = $conn->query($sqlInsertar);

    if($resultadoInsertar){
        //Registro exitoso
        echo "
        <script>
        alert('Cuenta creada con éxito');
        window.location.href='login.php';
        </script>
        ";
    }else{
        //Error en creacion
        echo "
        <script>
        alert('Error en la creación de cuenta');
        window.location.href='registro.php';
        </script>
        ";
    }
}

//Cerrar la conexión con la base de datos
$conn->close();

?>
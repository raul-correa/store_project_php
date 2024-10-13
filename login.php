<?php

//Conectar a la base de datos
$servername = 'localhost';
$usernameserver = 'root';
$passwordserver = '';
$dbname = 'users';

//Crear conexión
$conn = new mysqli($servername, $usernameserver, $passwordserver, $dbname);

//Verificando conexión
if($conn-> connect_error){
    die("Conexión Fallida");
}

//Obteniendo valores del formulario
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST["username"];
    $pass = $_POST["password"];

    //Consultar para buscar el usuario en la base de datos
    $sql = "select * from users where username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows>0){
        //verificar contraseña
        $row = $result->fetch_assoc();
        if($pass === $row["password"]){
            header("Location: welcome.php");
            exit;
        }
        else{
            echo "Contraseña incorrecta";
        }
    }
    else{
        echo 'Usuario no encontrado';
    }

    $stmt->close();

}

$conn->close();

?>

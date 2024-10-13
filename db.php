<?php
//Configuracion a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "companydb";

//Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);


//Verificar conexión
if($conn->connect_error){
    die("Conexión fallida");
}

//Consulta SQL para obtener los nombres y apellidos de la tabla employees
$sql = "SELECT first_name, last_name, email, phone_number FROM employees";
$result = $conn->query($sql);

// Consulta para consultar el nombre y el presupuesto del proyecto
$sql2 = "SELECT project_name, budget FROM projects";
$result2 = $conn->query($sql2);

// Consulta para consultar el del departamento
$sql3 = "SELECT department_name FROM departments";
$result3 = $conn->query($sql3);
?>
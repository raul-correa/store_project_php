<?php
require 'db.php';

session_start();

//Verificamos que la sesión esté creada
if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit();
}

// Agregamos la logica para obtener informacion de un empleado
if(isset($_GET["view_employee_id"])){
    $view_employee_id = $_GET["view_employee_id"];
    $stmt = $conn->prepare("SELECT * FROM employees WHERE employee_id = ?");
    $stmt->bind_param("i", $view_employee_id);
    $stmt -> execute();
    $employee = $stmt->get_result()->fetch_assoc();
}

//Procesamos el formulario de agregar empleado
if($_SERVER['REQUEST_METHOD']=='POST' && !isset($_POST["employee_id"])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $hire_date = $_POST["hire_date"];
    $job_title = $_POST["job_title"];
    $department_id = $_POST["department_id"];
    
    //Insertar el nuevo empleado la base de datos
    $stmt = $conn->prepare("INSERT INTO
    employees(first_name, last_name, email, phone_number, hire_date, job_title, department_id)
    VALUES(?,?,?,?,?,?,?)");

    $stmt->bind_param("ssssssi", $first_name, $last_name, $email, $phone_number, $hire_date, $job_title, $department_id);

    if($stmt -> execute()){
        echo "<script>alert('Empleado agregado con éxito')</script>";
    } else{
        echo "<script>alert('Error al agregar el empleado')</script>";
    }

    $stmt->close();

}

//Verificar si se ha enviado el ID del empleado
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["employee_id"])){
    $employee_id = $_POST["employee_id"];
    

    //Ejecutamos la consulta para eliminar empleado
    $sql = "DELETE FROM employees WHERE employee_id = ?";
    $stmt = $conn-> prepare($sql);
    $stmt->bind_param("i", $employee_id);

    if($stmt -> execute()){
        echo "<script>alert('Empleado eliminado con éxito')</script>";
    } else{
        echo "<script>alert('No se pudo eliminar al empleado')</script>";
    }

    $stmt->close();
}

//Variable de busqueda
$search = isset($_GET["search"]) ? $_GET["search"] : "";

//SQL de busqueda
$sql = "SELECT employee_id, first_name, last_name, phone_number FROM employees WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Importando fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <title>Empleados</title>
</head>
<body>

    <!-- Admin header -->

    <?php include 'admin_header.php'; ?>

    <!-- Inicio de titulo de pagina -->
    <div class="container mt-4 mb-4">
        <h2>Tabla de empleados</h2>
    </div>

    <!-- buscador de empleados -->
     <div class="container mt-4">
        <form action="" class="d-flex">
            <input class="form-control me-2" type="search" name="search" method="GET" placeholder="Ingresa el nombre del empleado a buscar" value="<?php echo $search ?>">
            <input class="btn btn-outline-dark" type="submit" value="Buscar">
        </form>
     </div>

    <!-- Inicio de botones -->

    <div class="container d-flex justify-content-end mt-2">
        <button class="btn btn-dark mt-2 me-2" data-bs-toggle="modal" data-bs-target="#agregarEmpleadoModal"><i class="fa-solid fa-user-plus"></i> Agregar empleado</button>
        <button class="btn btn-outline-dark mt-2"><i class="fa-regular fa-file-pdf"></i> Descargar empleados</button>
    </div>

    <!-- Inicio de la tabla empleados -->
    <div class="container mt-4 mb-4">
        <?php
        //Verificar si hay resultados
        if($result->num_rows>0){ ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del empleado</th>
                        <th>Apellido del empleado</th>
                        <th>Telefono del empleado</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($row = $result->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row["first_name"] ?></td>
                            <td><?php echo $row["last_name"] ?></td>
                            <td><?php echo   $row["phone_number"] ?></td>
                            <td class="options">
                                <form method="GET">
                                    <input type="hidden" name="view_employee_id" value="<?php echo $row['employee_id']; ?> ">
                                    <button class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver Empleado"><i class="fa-regular fa-eye"></i></button></td>
                                </form>
                            <td class="options"><button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar"><i class="fa-regular fa-pen-to-square"></i></button></td>
                            <form method="POST" onsubmit=" return confirm('¿Estás seguro de eliminar al empleado?')">
                                <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">
                                <td class="options"><button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar"><i class="fa-solid fa-trash"></i></button></td>
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        <?php } else{
            echo "No existen empleados";
        }
        ?>
    </div>
    <!-- fin tabla empleados -->

    <!-- inicio modal de ver empleado -->

    <?php if(isset($employee)){?>

        <div class="modal fade show d-block" tabindex="-1" aria-labelby="verEmpleadoModal" aria-hidden="">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="verEmpleadoModal">Detalles del Empleado</h5>
                        <a href="gestionar_empleados.php" class="btn-close" aria-label="Cerrar"></a>
                    </div>

                    <div class="modal-body">
                        <p><strong>Nombre:</strong> <?php echo $employee['first_name']; ?></p>
                        <p><strong>Apellido:</strong> <?php echo $employee['last_name']; ?></p>
                        <p><strong>Email:</strong> <?php echo $employee['email']; ?></p>
                        <p><strong>Teléfono:</strong> <?php echo $employee['phone_number']; ?></p>
                        <p><strong>Cargo:</strong> <?php echo $employee['job_title']; ?></p>
                        <p><strong>Departamento:</strong> <?php echo $employee['department_id']; ?></p>
                    </div>

                    <div class="modal-footer">
                        <a href="gestionar_empleados.php" class="btn btn-secondary">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
        
    <?php } ?>

    <!-- fin de modal ver empleado -->

    <!-- inicio del modal para agregar empleados -->

    <div class="modal fade" id="agregarEmpleadoModal" tabindex="1" aria-labelledby="agregarEmpleadoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarEmpleadoModal">Agregar nuevo Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">

                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Apellido</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Correo</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Teléfono</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Fecha de contratación</label>
                            <input type="date" name="hire_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Cargo</label>
                            <input type="text" name="job_title" class="form-control" required>
                        </div>  

                        <div class="mb-3">
                            <label>Seleccionar departamento</label>
                            <select class="form-control" name="department_id" required>
                                <option value="1">HR</option>
                                <option value="2">IT</option>
                                <option value="3">Marketing</option>
                                <option value="4">Sales</option>
                                <option value="5">Finance</option>
                            </select>    
                        </div>

                        <div class="mb-3">
                            <input type="submit" class="btn btn-dark" value="Crear empleado">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- fin modal agregar empleado -->

    <!-- footer.php -->

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
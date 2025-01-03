<?php
require 'db.php';

session_start();

//Verificamos que la sesión esté creada
if(!isset($_SESSION["user"])){
    header("Location: login.php");
    exit();
}

//Variable de busqueda
$search = isset($_GET["search"]) ? $_GET["search"] : "";

//SQL de busqueda
$sql = "SELECT department_name FROM departments WHERE department_name LIKE '%$search%'";
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

    <title>Departamento</title>
</head>
<body>

    <!-- Admin header -->

    <?php include 'admin_header.php'; ?>

    <!-- Inicio de titulo de pagina -->
    <div class="container mt-4 mb-4">
        <h2>Tabla de departamentos</h2>
    </div>

    <!-- buscador de departamentos -->
     <div class="container mt-4">
        <form action="" class="d-flex">
            <input class="form-control me-2" type="search" name="search" method="GET" placeholder="Ingresa el nombre del departamento a buscar" value="<?php echo $search ?>">
            <input class="btn btn-outline-dark" type="submit" value="Buscar">
        </form>
     </div>

    <!-- Inicio de botones -->

    <div class="container d-flex justify-content-end mt-2">
        <button class="btn btn-dark mt-2 me-2"><i class="fa-solid fa-user-plus"></i> Agregar departamento</button>
        <button class="btn btn-outline-dark mt-2"><i class="fa-regular fa-file-pdf"></i> Descargar departamentos</button>
    </div>

    <!-- Inicio de la tabla departamentos -->
    <div class="container mt-4 mb-4">
        <?php
        //Verificar si hay resultados
        if($result->num_rows>0){ ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del departamento</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($row = $result->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row["department_name"] ?></td>
                            <td class="options"><button class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver Departamento"><i class="fa-regular fa-eye"></i></button></td>
                            <td class="options"><button class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar"><i class="fa-regular fa-pen-to-square"></i></button></td>
                            <td class="options"><button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        <?php } else{
            echo "No existen departamentos";
        }
        ?>
    </div>

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
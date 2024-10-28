<?php
require 'db.php';
session_start();

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
    <title>Departamentos</title>
</head>
<body>

    <!-- header.php -->

    <?php include 'header.php'; ?>

    <!-- buscador de empleados -->
    <div class="container mt-4">
        <form action="" class="d-flex">
            <input class="form-control me-2" type="search" name="search" method="GET" placeholder="Ingresa el nombre del departamento" value="<?php echo $search ?>">
            <input class="btn btn-outline-dark" type="submit" value="Buscar">
        </form>
     </div>

    <div class="container mt-4 mb-4">
        <h2>Departamentos</h2>

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
                    <?php while($row = $result->fetch_assoc()){
                    echo "<tr>"."<td>".$row["department_name"]."</td>"."</tr>";
                    } ?>
                </tbody>

            </table>

        <?php } else{
            echo "No existen departamentos";
        }
        ?>
    </div>

    <!-- footer.php -->

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Proyectos</title>
</head>
<body>

    <!-- header.php -->

    <?php include 'header.php'; ?>

    <div class="container mt-4 mb-4">
        <h2>Proyectos</h2>

        <?php
        //Verificar si hay resultados
        if($result2->num_rows>0){
            echo "<ul>";

            while($row = $result2->fetch_assoc()){
                echo "<li>".$row["project_name"]." ".$row["budget"]."</li>";
            }

            echo "</ul>";
        } else{
            echo "No existen proyectos";
        }
        ?>
    </div>

    <!-- footer.php -->

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
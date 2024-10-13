<?php require 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ISIL GAMER</title>
</head>
<body>
    <!-- header.php -->

    <?php include 'header.php'; ?>

    <!-- CARRUSEL -->
        <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="images/slide1.webp" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="images/slide3.png" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    <div class="container mt-4 mb-4">
        <h1>Hello World</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim iure ipsam aliquid aspernatur, deleniti quam velit a, voluptas voluptatem placeat nemo ipsa animi necessitatibus harum numquam asperiores dolorum. Vitae, sapiente!</p>
        
        
    
    </div>

    <div class="container mt-4 mb-4 text-center">
        <h2>Top 3 Videojuegos</h2>
        <div class="row">
            <div class="col-md-4">
                <h3>Warzon</h3>
                <img class="img-fluid" src="images/warzone.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis commodi maxime voluptatem, est aut explicabo id nam, unde quis iusto magni consectetur placeat pariatur obcaecati? Aliquid ipsum eos iste delectus.</p>
                <button class="btn btn-warning btn-md">Comprar</button>
                <button class="btn btn-outline-warning btn-md">Ver más</button>
            </div>
            <div class="col-md-4">
                <h3>Valorant</h3>
                <img class="img-fluid" src="images/warzone.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis commodi maxime voluptatem, est aut explicabo id nam, unde quis iusto magni consectetur placeat pariatur obcaecati? Aliquid ipsum eos iste delectus.</p>
                <button class="btn btn-warning btn-md">Comprar</button>
                <button class="btn btn-outline-warning btn-md">Ver más</button>
            </div>
            <div class="col-md-4">
                <h3>League of legends</h3>
                <img class="img-fluid" src="images/warzone.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis commodi maxime voluptatem, est aut explicabo id nam, unde quis iusto magni consectetur placeat pariatur obcaecati? Aliquid ipsum eos iste delectus.</p>
                <button class="btn btn-warning btn-md">Comprar</button>
                <button class="btn btn-outline-warning btn-md">Ver más</button>
            </div>
        </div>
    </div>
    
    <!-- footer.php -->

    <?php include 'footer.php'; ?>

    <?php
        //Cerrar conexión
        $conn->close();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-warning">
  <div class="container-fluid">
      <a class="navbar-brand" href="#">Peru Gamers</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            <a class="nav-link" href="empleados.php">Empleados</a>
            <a class="nav-link" href="proyectos.php">Proyectos</a>
            <a class="nav-link" href="departamentos.php">Departamentos</a>
            <a class="nav-link" href="contacto.php">Contacto</a>
            <a class="nav-link" href="login.php">Mi cuenta</a>
        </div>
      </div>

      <?php if(isset($_SESSION["user"])): ?>
        <!-- Seccion de usuario conectado -->
         <img src="images/avatar.png" class="avatar" alt="">
        <span style="padding-right: 5px;">Bienvenido, <?php echo $_SESSION["user"]; ?></span>
        <span> <a href="logout.php">Cerrar sesión</a></span>
      <?php  endif; ?>
  </div>
</nav>
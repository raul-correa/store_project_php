<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
      <a class="navbar-brand" href=".">Peru Gamers</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="gestionar_empleados.php">Gestionar Empleados</a>
            <a class="nav-link" href="gestionar_proyectos.php">Gestionar Proyectos</a>
            <a class="nav-link" href="gestionar_departamentos.php">Gestionar Departamentos</a>
        </div>
      </div>

      <?php if(isset($_SESSION["user"])): ?>
        <!-- Seccion de usuario conectado -->
         <img src="images/avatar.png" class="avatar" alt="">
        <span class="text-white" style="padding-right: 5px;">Bienvenido, <?php echo $_SESSION["user"]; ?></span>
        <span> <a href="logout.php">Cerrar sesión</a></span>
      <?php  endif; ?>
  </div>
</nav>
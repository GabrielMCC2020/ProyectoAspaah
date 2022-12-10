<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header('location: index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD con PHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesonme/css/font-awesome.css">
	<link rel="stylesheet" href="fancybox/dist/jquery.fancybox.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="return enlace(this.href)" href="socio_list.php">Socios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="return enlace(this.href)" href="maquinaria_list.php">Maquinarias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <div><a href="logout.php" class="btn btn-success">Cerrar Sesion</a></div>
    </div>
  </div>
</nav>
<div class="container mt-3">
	<div id="crud"></div>
</div>

<script src="bootstrap/jquery.min.js"></script>
<script src="bootstrap/bootstrap.bundle.min.js"></script>
<script src="fancybox/dist/jquery.fancybox.min.js"></script>
<script src="bootstrap/jquery.validate.min.js"></script>
<script src="scripts.js"></script>

</body>
</html>

<script type="text/javascript">
  function enlace(evento){
  $("#crud").fadeOut(300,function(){
    $(this).load(evento).fadeIn(2000);
  })
  return false;
}
</script>
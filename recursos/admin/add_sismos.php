<?php
	include("../../dll/seguridad.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name;?></title>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
<header>
	<h2><?php echo $site_name;?></h2>
	<nav>
		<a href="index.php">Sismos</a>
		<a href="usuarios.php">Usuarios</a>
		<a href="../../dll/salir.php">Salir</a>
	</nav>
</header>
<main>
	<section class="content">
		<h2>Nuevo Registro</h2>
		<form method="post" action="save.php" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="lugar">Lugar</label>
		    <input type="text" name="lugar" class="form-control" id="lugar" aria-describedby="lugarHelp" placeholder="Lugar del sismo">
		    <small id="lugarHelp" class="form-text text-muted">Lugar afectado del sismo</small>
		  </div>
		  <div class="form-group">
		    <label for="fecha">Fecha</label>
		    <input type="text" name="fecha" class="form-control" id="fecha" placeholder="0000 - 00 - 00">
		  </div>
		  <div class="form-group">
		    <label for="pais">País</label>
		    <input type="text" name="pais" class="form-control" id="pais" placeholder="Pais">
		  </div>
		  <div class="form-group">
		    <label for="provincia">Provincia</label>
		    <input type="text" name="provincia" class="form-control" id="provincia" placeholder="Provincia">
		  </div>
		  <div class="form-group">
		    <label for="ciudad">Ciudad</label>
		    <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad">
		  </div>
		  <div class="form-group">
		    <label for="reporte">Reporte</label>
		    <input type="text" name="reporte" class="form-control" id="reporte" placeholder="Reporte">
		  </div>
		  <div class="form-group">
		    <label for="magnitud">Magnitud</label>
		    <input type="text" name="magnitud" class="form-control" id="magnitud" placeholder="Magnitud">
		  </div>
		  <div class="form-group">
		    <label for="hora">Hora</label>
		    <input type="time" name="hora" class="form-control" id="hora" placeholder="Hora">
		  </div>
		  <div class="form-group">
		    <label for="epicentro">Epicentro</label>
		    <input type="text" name="epicentro" class="form-control" id="epicentro" placeholder="Epicentro">
		  </div>
		  <div class="form-group">
		    <label for="profundidad">Profundidad</label>
		    <input type="text" name="profundidad" class="form-control" id="profundidad" placeholder="Profundidad">
		  </div>
		  <div class="form-group">
		    <label for="replicas">Replicas</label>
		    <input type="number" name="replicas" class="form-control" id="replicas" placeholder="Replicas">
		  </div>
		  <div class="form-group">
		    <label for="desaparecidos">Desaparecidos</label>
		    <input type="number" name="desaparecidos" class="form-control" id="desaparecidos" placeholder="Desaparecidos">
		  </div>
		  <div class="form-group">
		    <label for="fallecidos">Fallecidos</label>
		    <input type="number" name="fallecidos" class="form-control" id="fallecidos" placeholder="Fallecidos">
		  </div>
		  <div class="form-group">
		    <label for="afectada">Ciudad afectada</label>
		    <input type="number" name="afectada" class="form-control" id="afectada" placeholder="Ciudad afectada">
		  </div>
		  <div class="form-group">
		    <label for="archivo">Imagen</label>
		    <input type="file" name="archivo" class="form-control" id="archivo" >
		  </div>
		  <div class="form-group">
		    <label for="estado">Estado</label>
		    <select name="estado" class="form-control">
			  <option value=""></option>
			  <option value="1">Publicado</option>
			  <option value="2">Oculto</option>
			</select>
		  </div>
		 
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</section>
</main>
<footer>
	<h6>Derechos Sreservados UTPL | 2018 Power by TAW</h6>
</footer>
</body>
</html>
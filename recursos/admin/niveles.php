<?php
	include("../../dll/seguridad.php");
	extract($_GET);
	extract($_POST);
	if(isset($nombre_rol)){
		$miconexion->consulta("insert into rol values('','$nombre_rol','$detall_rol')");
		echo "<script>location.href='roles.php'</script>";
	}
	if (isset($id_rol_up)) {
		$miconexion->consulta("update rol set nombre='$nombre_rol_up', detalle='$detall_rol' where id=$id_rol_up");
		echo "<script>location.href='roles.php'</script>";
	}
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
		<a href="index.php">Proyectos TT</a>
		<a href="usuarios.php">Usuarios</a>
		<a href="../../dll/salir.php">Salir</a>
	</nav>
</header>
<main>
	<aside class="menusaside">
		<?php include("menu.php");?>
	</aside>
	<section class="content">
		<section class="cont1">
		<h2>Registros de Niveles de Usuarios</h2>
		<?php
			$miconexion->consulta("select * from nivel");
			$miconexion->verconsulta_crud();
			if (@$var==2) {
				$res=$miconexion->consulta("delete from rol where id=$id_s");
				echo "<script>location.href='roles.php?res=$res'</script>";
			}
		?>
		</section>
		<section class="cont2">
			<div class="cont_right">
			<?php 
			if(@$var==1){
			$miconexion->consulta("select * from rol where id=$id_s");
			$lista=$miconexion->consulta_lista();
				?>
				<form method="post" action="roles.php" enctype="multipart/form-data">
			  <div class="form-group"><br>
			    <label for="nombre_rol_up">Nombre del Rol</label>
			    <input type="hidden" name="id_rol_up"  value="<?php echo $lista[0]?>">
			    <input type="text" name="nombre_rol_up" class="form-control" id="nombre_rol_up"  value="<?php echo $lista[1]?>">
			  </div>
			  <div class="form-group">
			    <label for="detall_rol">Detalle del rol</label>
			    <input type="text" name="detall_rol" class="form-control" id="detall_rol" value="<?php echo $lista[2]?>">
			  </div>
			  <button type="submit" class="btn btn-primary">Actualizar Rol</button><br><br>
			</form>
				<?php
			}else{
			?>
			<form method="post" action="roles.php" enctype="multipart/form-data">
			  <div class="form-group"><br>
			    <label for="nombre_rol">Nombre del Rol</label>
			    <input type="text" name="nombre_rol" class="form-control" id="nombre_rol">
			  </div>
			  <div class="form-group">
			    <label for="detall_rol">Detalle del rol</label>
			    <input type="text" name="detall_rol" class="form-control" id="detall_rol" >
			  </div>
			  <button type="submit" class="btn btn-primary">Guardar Rol</button><br><br>
			</form>
		<?php } ?>
			</div>
			</section>
	</section>
</main>
<footer>
	<h6>Derechos Sreservados UTPL | 2018 Power by TAW</h6>
</footer>
</body>
</html>
<?php
	include("../../dll/seguridad.php");
	extract($_GET);
	extract($_POST);
	if(isset($fecha_inf)){
		$miconexion->consulta("insert into informe values('','$fecha_inf','$detalle_inf')");
		echo "<script>location.href='informes.php'</script>";
	}
	if (isset($id_det_up)) {
		$miconexion->consulta("update informe set fecha='$fecha_inf_up', detalle='$detalle_inf_up' where id=$id_det_up");
		echo "<script>location.href='informes.php'</script>";
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
		<h2>Registros de Informes</h2>
		<?php
			$miconexion->consulta("select id, fecha, detalle from informe");
			$miconexion->verconsulta_crud_tabla("informes");
			if (@$var==2) {
				$res=$miconexion->consulta("delete from informe where id=$id_s");
				echo "<script>location.href='informes.php?res=$res'</script>";
			}
		?>
		</section>
		<section class="cont2">
			<div class="cont_right">
			<?php 
			if(@$var==1){
			$miconexion->consulta("select * from informe where id=$id_s");
			$lista=$miconexion->consulta_lista();
				?>
				<form method="post" action="informes.php" enctype="multipart/form-data">
			    <div class="form-group"><br>
				    <label for="nombres_usr">Fecha del informe</label>
				    <input type="date" name="fecha_inf_up" class="form-control" id="nombres_usr"  value="<?php echo $lista[1]?>">
			    	<input type="hidden" name="id_det_up"  value="<?php echo $lista[0]?>">
				  </div>
				  <div class="form-group">
				    <label for="detalle_inf">Detalle del informe</label>
				    <textarea name="detalle_inf_up" id="detalle_inf" rows="5" cols="30"><?php echo $lista[2]?></textarea>
				  </div>
				  <div class="form-group">
				
			  <button type="submit" class="btn btn-primary">Actualizar Usuario</button><br><br>
			</form>
				<?php
			}else{
			?>
			<form method="post" action="informes.php" enctype="multipart/form-data">
			  <div class="form-group"><br>
			    <label for="fecha_inf">Fecha del informe</label>
			    <input type="date" name="fecha_inf" class="form-control" id="fecha_inf">
			  </div>
			  <div class="form-group">
			    <label for="detalle_inf">Detalle del informe</label>
			    <textarea name="detalle_inf" id="detalle_inf" rows="5" cols="30"></textarea>
			  </div>
			 
			  <button type="submit" class="btn btn-primary">Guardar Informe</button><br><br>
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
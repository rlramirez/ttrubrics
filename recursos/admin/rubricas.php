<?php
	include("../../dll/seguridad.php");
	extract($_GET);
	extract($_POST);
	if(isset($criterio_rub)){
		$miconexion->consulta("insert into rubricas values('','$criterio_rub','$fines_rub','$modo_rub','$fecha_elab_rub','$fecha_apli_rub','$version_rub','$calificacion_rub','$inf_rub')");

		echo "<script>location.href='rubricas.php'</script>";
	}
	if (isset($id_det_up)) {
		$miconexion->consulta("update rubricas set criterio='$criterio_rub_up', fines='$fines_rub_up', modo='$modo_rub_up', fecha_elab='$fecha_elab_rub_up', fecha_aplic='$fecha_apli_rub_up', version='$version_rub_up', calificacion='$calificacion_rub_up', informe_id='$inf_rub_up' where id=$id_det_up");
		echo "<script>location.href='rubricas.php'</script>";
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
		<h2>Registros de Rubricas</h2>
		<?php
			$miconexion->consulta("select id, criterio, fines, modo, fecha_elab,fecha_aplic, version, calificacion from rubricas");
			$miconexion->verconsulta_crud_tabla("rubricas");
			if (@$var==2) {
				$res=$miconexion->consulta("delete from rubricas where id=$id_s");
				echo "<script>location.href='rubricas.php?res=$res'</script>";
			}
		?>
		</section>
		<section class="cont2">
			<div class="cont_right">
			<?php 
			if(@$var==1){
			$miconexion->consulta("select * from rubricas where id=$id_s");
			$lista=$miconexion->consulta_lista();
				?>
				<form method="post" action="rubricas.php" enctype="multipart/form-data">
				 <div class="form-group"><br>
				    <label for="criterio_rub_up">Criterio</label>
				    <input type="text" name="criterio_rub_up" class="form-control" id="criterio_rub_up" value="<?php echo $lista[1]?>">
			    	<input type="hidden" name="id_det_up"  value="<?php echo $lista[0]?>">
				  </div>
				  <div class="form-group">
				    <label for="fines_rub_up">Fines</label>
				    <input type="text" name="fines_rub_up" class="form-control" id="fines_rub_up" value="<?php echo $lista[2]?>">
				  </div>
				  <div class="form-group">
				    <label for="modo_rub_up">Modo</label>
				    <input type="text" name="modo_rub_up" class="form-control" id="modo_rub_up" value="<?php echo $lista[3]?>">
				  </div>
				  <div class="form-group">
				    <label for="fecha_elab_rub_up">Fecha Elaboración</label>
				    <input type="date" name="fecha_elab_rub_up" class="form-control" id="fecha_elab_rub_up" value="<?php echo $lista[4]?>">
				  </div>
				  <div class="form-group">
				    <label for="fecha_apli_rub_up">Fecha Aplicación</label>
				    <input type="date" name="fecha_apli_rub_up" class="form-control" id="fecha_apli_rub_up" value="<?php echo $lista[5]?>">
				  </div>
				  <div class="form-group">
				    <label for="version_rub_up">Version</label>
				    <input type="text" name="version_rub_up" class="form-control" id="version_rub_up" value="<?php echo $lista[6]?>">
				  </div>
				  <div class="form-group">
				    <label for="calificacion_rub_up">Calificación</label>
				    <input type="text" name="calificacion_rub_up" class="form-control" id="calificacion_rub_up" value="<?php echo $lista[7]?>">
				  </div>
				  <div class="form-group">
					    <label for="inf_rub_up">Informe</label>
					    <?php
					    	$miconexion->consulta("select id, fecha from informe");
							$miconexion->verconsulta_select_up($lista[8],"inf_rub_up");
					    ?>
					  </div>
				
			  <button type="submit" class="btn btn-primary">Actualizar</button><br><br>
			</form>
				<?php
			}else{
			?>
			<form method="post" action="rubricas.php" enctype="multipart/form-data">
			  <div class="form-group"><br>
			    <label for="criterio_rub">Criterio</label>
			    <input type="text" name="criterio_rub" class="form-control" id="criterio_rub">
			  </div>
			  <div class="form-group">
			    <label for="fines_rub">Fines</label>
			    <input type="text" name="fines_rub" class="form-control" id="fines_rub">
			  </div>
			  <div class="form-group">
			    <label for="modo_rub">Modo</label>
			    <input type="text" name="modo_rub" class="form-control" id="modo_rub">
			  </div>
			  <div class="form-group">
			    <label for="fecha_elab_rub">Fecha Elaboración</label>
			    <input type="date" name="fecha_elab_rub" class="form-control" id="fecha_elab_rub">
			  </div>
			  <div class="form-group">
			    <label for="fecha_apli_rub">Fecha Aplicación</label>
			    <input type="date" name="fecha_apli_rub" class="form-control" id="fecha_apli_rub">
			  </div>
			  <div class="form-group">
			    <label for="version_rub">Version</label>
			    <input type="text" name="version_rub" class="form-control" id="version_rub">
			  </div>
			  <div class="form-group">
			    <label for="calificacion_rub">Calificación</label>
			    <input type="text" name="calificacion_rub" class="form-control" id="calificacion_rub">
			  </div>
			  <div class="form-group">
				    <label for="inf_rub">Informe</label>
				    <?php
				    	$miconexion->consulta("select id, fecha from informe");
						$miconexion->verconsulta_select("inf_rub");
				    ?>
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
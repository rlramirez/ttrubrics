<?php
	include("../../dll/seguridad.php");
	extract($_GET);
	extract($_POST);
	if(isset($nombre_pro)){
		$miconexion->consulta("insert into proyectostt values('','$nombre_pro','$fecha_ini_pro','$fecha_fin_pro','$doc_pro','$periodo_pro','$rubrica_pro')");
		echo "<script>location.href='proyectos.php'</script>";
	}
	if (isset($id_det_up)) {
		$miconexion->consulta("update proyectostt set nombrett='$nombre_pro_up', fecha_inicio='$fecha_ini_pro_up',fecha_fin='$fecha_fin_pro_up', doc_tt='$doc_pro_up', periodos_id='$periodo_pro_up', rubricas_id='$rubrica_pro_up' where id=$id_det_up");
		echo "<script>location.href='proyectos.php'</script>";
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
		<h2>Registros de Proyectos</h2>
		<?php
			$miconexion->consulta("select id, nombrett, fecha_inicio, fecha_fin from proyectostt");
			$miconexion->verconsulta_crud_tabla("proyectos");
			if (@$var==2) {
				$res=$miconexion->consulta("delete from proyectostt where id=$id_s");
				echo "<script>location.href='proyectos.php?res=$res'</script>";
			}
		?>
		</section>
		<section class="cont2">
			<div class="cont_right">
			<?php 
			if(@$var==1){
			$miconexion->consulta("select * from proyectostt where id=$id_s");
			$lista=$miconexion->consulta_lista();
				?>
				<form method="post" action="proyectos.php" enctype="multipart/form-data">


			    <div class="form-group"><br>
				    <label for="nombres_usr">Nombres del Usuario</label>
				    <input type="text" name="nombre_pro_up" class="form-control" id="nombres_usr"  value="<?php echo $lista[1]?>">
			    	<input type="hidden" name="id_det_up"  value="<?php echo $lista[0]?>">
				  </div>
				  <div class="form-group">
				    <label for="fecha_ini_pro_up">Fecha de inicio</label>
				    <input type="date" name="fecha_ini_pro_up" class="form-control" id="fecha_ini_pro_up"  value="<?php echo $lista[2]?>">
				  </div>
				  <div class="form-group">
				    <label for="fecha_fin_pro_up">Fecha de finalización</label>
				    <input type="date" name="fecha_fin_pro_up" class="form-control" id="fecha_fin_pro_up"  value="<?php echo $lista[3]?>">
				  </div>
				  <div class="form-group">
				    <label for="doc_pro_up">Documento</label>
				    <input type="text" name="doc_pro_up" class="form-control" id="doc_pro_up" value="<?php echo $lista[4]?>" >
				  </div>
				  <div class="form-group">
				    <label for="periodo_pro_up">Periodo</label>
				    <?php
				    	$miconexion->consulta("select id, nombre from periodos");
						$miconexion->verconsulta_select_up($lista[5],"periodo_pro_up");
				    ?>
				  </div>
				   <div class="form-group">
				    <label for="rubrica_pro_up">Rubrica</label>
				    <?php
				    	$miconexion->consulta("select id, criterio from rubricas");
						$miconexion->verconsulta_select_up($lista[6],"rubrica_pro_up");
				    ?>
				  </div>

			  <button type="submit" class="btn btn-primary">Actualizar </button><br><br>
			</form>
				<?php
			}else{
			?>
			<form method="post" action="proyectos.php" enctype="multipart/form-data">
			  <div class="form-group"><br>
			    <label for="nombre_pro">Nombre del Proyecto</label>
			    <input type="text" name="nombre_pro" class="form-control" id="nombre_pro">
			  </div>
			  <div class="form-group">
			    <label for="fecha_ini_pro">Fecha de inicio</label>
			    <input type="date" name="fecha_ini_pro" class="form-control" id="fecha_ini_pro" >
			  </div>
			  <div class="form-group">
			    <label for="fecha_fin_pro">Fecha de finalicación</label>
			    <input type="date" name="fecha_fin_pro" class="form-control" id="fecha_fin_pro" >
			  </div>
			  <div class="form-group">
			    <label for="doc_pro">Documento</label>
			    <input type="text" name="doc_pro" class="form-control" id="doc_pro" >
			  </div>
			  <div class="form-group">
			    <label for="periodo_pro">Período</label>
			    <?php
			    	$miconexion->consulta("select id, nombre from periodos");
					$miconexion->verconsulta_select("periodo_pro");
			    ?>
			  </div>
			   <div class="form-group">
			    <label for="rubrica_pro">Rubrica</label>
			    <?php
			    	$miconexion->consulta("select id, criterio from rubricas");
					$miconexion->verconsulta_select("rubrica_pro");
			    ?>
			  </div>
			  <button type="submit" class="btn btn-primary">Guardar</button><br><br>
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
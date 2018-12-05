<?php
	include("../../dll/seguridad.php");
	extract($_GET);
	extract($_POST);
	if(isset($nombres_usr)){
		$miconexion->consulta("insert into usuarios values('','$cedula_usr','$correo_usr','$clave_usr','$nombres_usr','$apellidos_usr','$rol_usr','$nvl_usr')");
		echo "<script>location.href='usuarios.php'</script>";
	}
	if (isset($id_usr_up)) {
		$miconexion->consulta("update usuarios set nombres='$nombres_usr_up', apellidos='$apellidos_usr',cedula='$cedula_usr', correo='$correo_usr' where id=$id_usr_up");
		echo "update usuarios set nombres='$nombres_usr_up', apellidos='$apellidos_usr',cedula='$cedula_usr', correo='$correo_usr' where id=$id_usr_up";
		//exit();
		echo "<script>location.href='usuarios.php'</script>";
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
		<h2>Registros de Usuarios</h2>
		<?php
			$miconexion->consulta("select id, cedula, nombres, apellidos from usuarios");
			$miconexion->verconsulta_crud_tabla("usuarios");
			if (@$var==2) {
				$res=$miconexion->consulta("delete from usuarios where id=$id_s");
				echo "<script>location.href='usuarios.php?res=$res'</script>";
			}
		?>
		</section>
		<section class="cont2">
			<div class="cont_right">
			<?php 
			if(@$var==1){
			$miconexion->consulta("select * from usuarios where id=$id_s");
			$lista=$miconexion->consulta_lista();
				?>
				<form method="post" action="usuarios.php" enctype="multipart/form-data">


			    <div class="form-group"><br>
				    <label for="nombres_usr">Nombres del Usuario</label>
				    <input type="text" name="nombres_usr_up" class="form-control" id="nombres_usr"  value="<?php echo $lista[4]?>">
			    	<input type="hidden" name="id_usr_up"  value="<?php echo $lista[0]?>">
				  </div>
				  <div class="form-group">
				    <label for="apellidos_usr">Apellidos del Usuario</label>
				    <input type="text" name="apellidos_usr" class="form-control" id="apellidos_usr"  value="<?php echo $lista[5]?>">
				  </div>
				  <div class="form-group">
				    <label for="cedula_usr">Cédula del Usuario</label>
				    <input type="number" name="cedula_usr" class="form-control" id="cedula_usr"  value="<?php echo $lista[1]?>">
				  </div>
				  <div class="form-group">
				    <label for="correo_usr">Correo del Usuario</label>
				    <input type="email" name="correo_usr" class="form-control" id="correo_usr" value="<?php echo $lista[2]?>" >
				  </div>
				  <div class="form-group">
				    <label for="clave_usr">Clave del Usuario</label>
				    <input type="password" name="clave_usr" class="form-control" id="clave_usr" >
				  </div>
				  <div class="form-group">
				    <label for="rol_usr">Rol del Usuario</label>
				    <?php
				    	$miconexion->consulta("select id, nombre from rol");
						$miconexion->verconsulta_select_up($lista[6],"rol_usr");
				    ?>
				  </div>
				   <div class="form-group">
				    <label for="nvl_usr">Nivel del Usuario</label>
				    <?php
				    	$miconexion->consulta("select id, nombre from nivel");
						$miconexion->verconsulta_select_up($lista[7],"nvl_usr");
				    ?>
				  </div>

			  <button type="submit" class="btn btn-primary">Actualizar Usuario</button><br><br>
			</form>
				<?php
			}else{
			?>
			<form method="post" action="usuarios.php" enctype="multipart/form-data">
			  <div class="form-group"><br>
			    <label for="nombres_usr">Nombres del Usuario</label>
			    <input type="text" name="nombres_usr" class="form-control" id="nombres_usr">
			  </div>
			  <div class="form-group">
			    <label for="apellidos_usr">Apellidos del Usuario</label>
			    <input type="text" name="apellidos_usr" class="form-control" id="apellidos_usr" >
			  </div>
			  <div class="form-group">
			    <label for="cedula_usr">Cédula del Usuario</label>
			    <input type="number" name="cedula_usr" class="form-control" id="cedula_usr" >
			  </div>
			  <div class="form-group">
			    <label for="correo_usr">Correo del Usuario</label>
			    <input type="email" name="correo_usr" class="form-control" id="correo_usr" >
			  </div>
			  <div class="form-group">
			    <label for="clave_usr">Clave del Usuario</label>
			    <input type="password" name="clave_usr" class="form-control" id="clave_usr" >
			  </div>
			  <div class="form-group">
			    <label for="rol_usr">Rol del Usuario</label>
			    <?php
			    	$miconexion->consulta("select id, nombre from rol");
					$miconexion->verconsulta_select("rol_usr");
			    ?>
			  </div>
			   <div class="form-group">
			    <label for="nvl_usr">Nivel del Usuario</label>
			    <?php
			    	$miconexion->consulta("select id, nombre from nivel");
					$miconexion->verconsulta_select("nvl_usr");
			    ?>
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
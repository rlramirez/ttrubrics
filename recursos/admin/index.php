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
		<h2>Registros de Sismos</h2>
		<h3><a href="add_sismos.php">Nuevo sismo +</a></h3>
		<?php
			$miconexion->consulta("select id, lugar, fecha, hora, pais, ciudad, epicentro, profundidad, magnitud, replicas, desaparecidos publicado from sismos");
			$miconexion->verconsulta_crud();
			if (@$var==2) {
				$miconexion->consulta("delete from sismos where id=$id_s");
				echo "<script>location.href='index.php'</script>";
			}
		?>
	</section>
</main>
<footer>
	<h6>Derechos Sreservados UTPL | 2018 Power by TAW</h6>
</footer>
</body>
</html>
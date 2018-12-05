<?php
include("config.php");
include("clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db,$host,$user_db,$pass_db);

extract($_POST);

$clave=md5($clave);
$miconexion->consulta("select * from usuarios where correo= '$correo' and clave='$clave'");
$lista=$miconexion->consulta_lista();
if (($lista[1]) AND ($lista[2])) {
	session_start();
	$_SESSION['correo']=$correo;
	echo "<script>location.href='../recursos/admin/index.php'</script>";
}else{
	echo "<script>location.href='../recursos/login.html'</script>";
}
?>
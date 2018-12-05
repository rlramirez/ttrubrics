<?php
	session_start();
	if($_SESSION["correo"]){
		include("config.php"); 
		include("clase_mysql.php");
		$miconexion = new clase_mysql;
		$miconexion->conectar($db,$host,$user_db,$pass_db);
	}else{
		echo "<script>location.href='../../recursos/login.html'</script>";
	}
?>
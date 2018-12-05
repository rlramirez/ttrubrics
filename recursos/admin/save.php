<?php
	include("../../dll/seguridad.php");
	extract($_POST);
	

	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	$archivo = $_FILES["archivo"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if ($archivo != "") {
		// guardamos el archivo a la carpeta files
		$destino =  "../../uploads/".$prefijo."_".$archivo;
		$nombre_archivo=$prefijo."_".$archivo;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			$status = "Archivo subido: <b>".$archivo."</b>";
		} else {
			$status = "Error al subir el archivo";
		}
	} else {
		$status = "Error al subir archivo";
	}
	


	$miconexion->consulta("insert into sismos values('','$lugar','$fecha','$pais','$provincia','$ciudad','$reporte','$magnitud','$hora','$epicentro','$profundidad','$replicas','$desaparecidos','$fallecidos','$afectada','$estado','','$nombre_archivo')");
	echo "<script>location.href='index.php'</script>";

?>
<?php
require_once("conexion.php");
$conexion = new Conexion();


$email=$_GET["email"];



$use1 = $conexion->prepare("SELECT COUNT(*) FROM usuario where usua_correo = ?");
if ($use1->execute(array($_GET['email']))) {
while ($fila = $use1->fetch()) {
	if ($fila[0]==1) {
		$estado=1;
			echo $estado;
	}else{
	$estado=0;
			echo $estado;
		}
}
}

$conexion=null;

?>
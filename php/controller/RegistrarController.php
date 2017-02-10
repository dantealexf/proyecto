<?php
require_once("conexion.php");
$conexion = new Conexion();

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$pais=$_POST["pais"];
$fechanacimiento=$_POST["fechanacimiento"];
$correo=$_POST["email"];
$telefono=$_POST["telefono"];
$url='/php/contoller';



// echo $nombre;
// echo $apellido;
// echo"<br>";
// echo $usuario;
// echo"<br>";
// echo $password;
// echo"<br>";
// echo $pais;
// echo"<br>";
// echo $fechanacimiento;
// echo"<br>";
// echo$correo;
// echo"<br>";
// echo$telefono;
echo"<br>";
// echo$url;

$use1 = $conexion->prepare("INSERT INTO usuario (usua_nombre, usua_apellido,usua_url,usua_usuario,usua_password,usua_pais,
	usua_fecha_nacimiento,usua_correo,usua_telefono) 
	VALUES (:usua_nombre,:usua_apellido,:usua_url,:usua_usuario,:usua_password,:usua_pais,:usua_fecha_nacimiento,:usua_correo,
	:usua_telefono)");

$use1->bindParam(":usua_nombre",$nombre);
$use1->bindParam(":usua_apellido",$apellido);
$use1->bindParam(":usua_url",$url);
$use1->bindParam(":usua_usuario",$usuario);
$use1->bindParam(":usua_password",$password);
$use1->bindParam(":usua_pais",$pais);
$use1->bindParam(":usua_fecha_nacimiento",$fechanacimiento);
$use1->bindParam(":usua_correo",$correo);
$use1->bindParam(":usua_telefono",$telefono);

$status=$use1->execute();

echo $status;

$conexion=null;

?>
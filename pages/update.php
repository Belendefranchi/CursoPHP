<?php

include("conexion.php");

$email=$_POST["email"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$email=$_POST["email"];
$categoria=$_POST["categoria"];
$pass=$_POST["pass"];


$query="UPDATE users SET nombre='$nombre', apellido='$apellido', categoria='$categoria', pass='$pass' WHERE email=:email";

$resultado=$base->prepare($query);
$resultado->bindValue(":email", $email);
$resultado->execute();

header("Location: loginOK.php");

?>
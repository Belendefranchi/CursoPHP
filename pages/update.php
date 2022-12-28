<?php

include("conexion.php");

$email=$_POST["email"];
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$email=$_POST["email"];
$categoria=$_POST["categoria"];
$pass=$_POST["pass"];

$hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);

$query="UPDATE users SET nombre='$nombre', apellido='$apellido', categoria='$categoria', pass='$hash' WHERE email=:email";

$resultado=$base->prepare($query);
$resultado->bindValue(":email", $email);
$resultado->execute();

header("Location: loginOK.php");

?>
<?php
    include("conexion.php");

    $nombre=htmlentities(addslashes($_POST["nombre"]));
    $apellido=htmlentities(addslashes($_POST["apellido"]));
    $email=htmlentities(addslashes($_POST["email"]));
    $pass=htmlentities(addslashes($_POST["pass"]));
    $cat=htmlentities(addslashes($_POST["categoria"]));
    
    $hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
    
    if($email){
        try{
            $query="UPDATE users SET nombre=:nombre, apellido=:apellido, categoria=:cat, pass=$hash WHERE email=:email";

            $resultado=$base->prepare($query);
            $resultado->bindParam(":nombre", $nombre, PDO::PARAM_INT);
            $resultado->bindParam(":apellido", $apellido, PDO::PARAM_INT);
            $resultado->bindParam(":email", $email, PDO::PARAM_INT);
            $resultado->bindParam(":cat", $cat, PDO::PARAM_INT);
            $resultado->execute();
            $resultado->closeCursor();

            header("location: loginOK.php");
            die();
        }catch (PDOException $e){
            echo "Linea del error: " . $e->getLine() . "<br>";
            header("location: no.php");
            die("Error: " . $e->getMessage());
    }
}
?>
<?php

    require("conexion.php");

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $email=$_POST["email"];
        $pass=$_POST["pass"];
        $cat=$_POST["cat"];

        $queryRepetido="SELECT email FROM users WHERE email=:email";
        $resultado=$base->prepare($queryRepetido);
        $resultado->bindValue(":email", $email); 
        $resultado->execute();
        
        $numero_registro=$resultado->rowCount();
        
        if ($numero_registro!=0){
            header("location:login.php");
        }else{ 
            $queryInsert="INSERT INTO users (nombre, apellido, email, pass, categoria) VALUES (:nombre, :apellido, :email, :pass, :cat)";
            $resultado=$base->prepare($queryInsert);
            $resultado->bindValue(":nombre", $nombre);
            $resultado->bindValue(":apellido", $apellido);
            $resultado->bindValue(":email", $email);	  		
            $resultado->bindValue(":pass", $pass);
            $resultado->bindValue(":cat", $cat);
            $resultado->execute();

            header("location:login.php");
        }

?>

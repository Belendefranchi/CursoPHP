<?php
    
    try{

        include("conexion.php");
        
        $email=htmlentities(addslashes($_GET["email"]));
        $pass=htmlentities(addslashes($_GET["pass"]));
        
        $query="SELECT * FROM users WHERE email=:email AND pass=:pass";
        
        $resultado=$base->prepare($query);
        $resultado->bindValue(":email", $email); 
        $resultado->bindValue(":pass", $pass);

        $resultado->execute();

        $numero_registro=$resultado->rowCount();

        if ($numero_registro!=0){
            header("location:loginOK.php");
        }else{
            header("location:login.html");
        }
    }

    catch(Exception $e){
        die("Error:" . $e->getMessage());
    }
?>

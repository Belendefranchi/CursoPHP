<?php
    try{
        $base=new PDO ("mysql:host=localhost; dbname=login", "root", "");
        //$base=new PDO ("mysql:host=localhost; dbname=c1760806_cac", "c1760806_cac", "EstupidoDonWeb4");
        $base->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $base->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec ("SET CHARACTER SET UTF8");

    }catch(Exception $e){
        die("Error:" . $e->getMessage());
        echo "Linea del error" . $e->getLine();

    }
?>
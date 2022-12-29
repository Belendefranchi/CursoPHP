<?php
    try{
        $base=new PDO ("mysql:host=localhost; dbname=login", "root", "");
        $base->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec ("SET CHARACTER SET UTF8");

    }catch(Exception $e){
        die("Error:" . $e->getMessage());
        echo "Linea del error" . $e->getLine();

    }
?>

Usuario c1760806_cac
Clave: EstupidoDonWeb4
Base de datos: c1760806_cac
Servidor: localhost


//bdefranchi     Qj&MLLWm7P%HSVtX!AvP     (sitio)            //id20071528_login      ow-kxxV_($&R%4oH     (base)
//c1760806_cac   EstupidoDonWeb4 (base donweb)
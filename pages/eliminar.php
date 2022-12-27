<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
    session_start();
    if (!isset($_SESSION["login"])){
        header("location: login.php");
    }
    $email=$_GET['email'];

    function deleteUser($email){
        include("conexion.php");
        $query="DELETE FROM users WHERE email=$email";
        $resul=$base->prepare($query);
        $resul->execute(array());
        $resul->closeCursor();
    };

        
    ?>
    <script>
        Swal.fire({
            title: 'Estas seguro de querer eliminar este usuario?',
            text: 'Si te arrepientes no podrás recuperarlo!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                <?php deleteUser($email) ?>
                Swal.fire(
                    'Deleted!',
                    'El usuario ha sido eliminado',
                    'success',
                )
            }
        })
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
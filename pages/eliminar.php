<?php

include("conexion.php");

function alert(){
    echo `<script>
            Swal.fire({
                title: 'Estas seguro de querer eliminar este usuario?',
                text: "Si te arrepientes no podrás recuperarlo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    
                    Swal.fire(
                    'Deleted!',
                    'El usuario ha sido eliminado',
                    'success'
                    )
                }
            })
        </script>`;
}

$email=$_GET['email'];

if(isset($email)){

    alert();

    $query="DELETE FROM users WHERE email=$email";
    $resul=$base->prepare($query);
    $resul->execute(array());
    $resul->closeCursor();

    header("Location: loginOK.php");
}

?>
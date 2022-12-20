<?php
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
?>
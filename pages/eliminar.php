<?php
session_start();
    if (!isset($_SESSION["login"])){
        header("location: login.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <title>Eliminar Usuario</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../images/codoacodo.png" alt="Logo" width="100" class="d-inline-block align-text-top">
                </a>
                <a class="navbar-brand links--principales">Conf Bs As</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <div class="">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link links--principales" href="../index.html#conferencia">La conferencia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link links" href="../index.html#oradores">Los oradores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link links" href="../index.html#lugar-fecha">El lugar y la fecha</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link links" href="../index.html#conviertete">Convi??rtete en orador</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link links--final" aria-current="page" href="tickets.html">Comprar tickets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link links--final" aria-current="page" href="logoff.php">Cerrar Sesi??n</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main style="min-height: 65vh;">
        <div class="text-center p-4">
            <h1>Eliminar Usuario</h1>
        </div>
        <div class="text-center mb-4">
            <h3><?php echo $_SESSION["name"]?></h3>
        </div>
        <?php
            if($_SESSION["login"]!="admin@codo.com.ar"){
                echo '<div class="text-center mb-4">
                            <h3>Solo el usuario administrador puede eliminar usuarios ????</h3>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-green" type="button" value="Volver" onClick="history.go(-1);"></input>
                        </div>
                        ';
            }else{

                $email=$_GET["email"];

                if($email==="admin@codo.com.ar"){
                    echo '<div class="text-center mb-4">
                            <h3>El usuario administrador no puede ser eliminado ????</h3>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-green" type="button" value="Volver" onClick="history.go(-1);"></input>
                        </div>
                        ';
                }else{
                    include("conexion.php");

                    $query="DELETE FROM users WHERE email=:email";

                    $resultado=$base->prepare($query);
                    $resultado->bindParam(":email", $email, PDO::PARAM_INT);
                    $resultado->execute();
                    $resultado->closeCursor();

                    echo '<div class="text-center mb-4">
                            <h3>El usuario fue eliminado correctamente</h3>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-green" type="button" value="Volver" onClick="history.go(-1);"></input>
                        </div>
                        ';
                }
            }
            ?>
    <footer>
        <section class="section__footer">
            <ul class="footer__list d-flex flex-row justify-content-around">
                <li class="footer__item">
                    <a class="links--principales" href="faqs.html">Preguntas frecuentas</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="contacto.html">Cont??ctanos</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="prensa.html">Prensa</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="conferencias.html">Conferencias</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="eula.html">T??rminos y condiciones</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="privacidad.html">Privacidad</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="estudiantes.html">Estudiantes</a>
                </li>
            </ul>
        </section>
    </footer>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
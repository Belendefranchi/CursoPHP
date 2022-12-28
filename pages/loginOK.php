<?php
    session_start();
    if (!isset($_SESSION["login"])){
        header("location: login.php");
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
    <title>Login</title>
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
                                <a class="nav-link links" href="../index.html#conviertete">Conviértete en orador</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link links--final" aria-current="page" href="tickets.html">Comprar tickets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link links--final" aria-current="page" href="logoff.php">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main style="min-height: 65vh;">
        <?php
            include("conexion.php");
            include("funciones.php");
            
            $query="SELECT nombre, apellido, email, categoria FROM users WHERE nombre <> 'admin'";
    
            $resultado=$base->prepare($query);
            $resultado->execute();     
            $users=$resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado->closeCursor ();

        ?>
        <div class="text-center p-4">
            <h1>Bienvenido!</h1>
        </div>
        <div class="text-center mb-4">
            <h3><?php echo $_SESSION["name"]?></h3>
        </div>
        <div class="text-center" style="width: 55rem; margin: auto;">
                <table class="table table-striped">
                    <?php
                        if($_SESSION["name"]==="admin"){
                            ?>
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Modificar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($users as $user){
                                        ?>
                                        <tr>
                                            <td><?php echo $user["nombre"]?></td>
                                            <td><?php echo $user["apellido"]?></td>
                                            <td><?php echo $user["email"]?></td>
                                            <td><?php echo $user["categoria"]?></td>
                                            <td><a href="modificar.php?email=<?php echo $user["email"]?>"><button class="btn btn-green" type='submit'>Modificar</button></a></td></td>
                                            <td><a href="eliminar.php?email=<?php echo $user["email"]?>"><button class="btn btn-green" type='submit'>Eliminar</button></a></td></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </tbody>
                            <?php
                        }else{
                            ?>
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Categoría</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($users as $user){
                                        ?>
                                        <tr>
                                            <td><?php echo $user["nombre"]?></td>
                                            <td><?php echo $user["apellido"]?></td>
                                            <td><?php echo $user["email"]?></td>
                                            <td><?php echo $user["categoria"]?></td>
                                        </tr>
                                        <?php
                                    }
                        }
                                        ?>
                            </tbody>
                </table>
            </form>
        </div>
    </main>
    <footer>
        <section class="section__footer">
            <ul class="footer__list d-flex flex-row justify-content-around">
                <li class="footer__item">
                    <a class="links--principales" href="faqs.html">Preguntas frecuentas</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="contacto.html">Contáctanos</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="prensa.html">Prensa</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="conferencias.html">Conferencias</a>
                </li>
                <li class="footer__item">
                    <a class="links--principales" href="eula.html">Términos y condiciones</a>
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
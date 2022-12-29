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
                <a class="navbar-brand" href="../index.html">
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
                                <a class="nav-link links--final" aria-current="page" href="login.php">Iniciar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php
            require("conexion.php");
            if (isset($_REQUEST["registroBtn"])){

                $nombre=htmlentities(addslashes($_REQUEST["nombre"]));
                $apellido=htmlentities(addslashes($_REQUEST["apellido"]));
                $email=htmlentities(addslashes($_REQUEST["email"]));
                $pass=htmlentities(addslashes($_REQUEST["pass"]));
                $cat=htmlentities(addslashes($_REQUEST["cat"]));
                $host=htmlentities(addslashes($_SERVER['REMOTE_ADDR']));

                $hash = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);

                if ($email){
                    try{
                        $queryRepetido="SELECT email FROM users WHERE email=:email";
                        $resultado=$base->prepare($queryRepetido);
                        $resultado->bindValue(":email", $email); 
                        $resultado->execute();
            
                        $numero_registro=$resultado->rowCount();
            
                        if ($numero_registro!=0){
                            echo '<div class="text-center mb-4 p-2"><strong>Ese mail ya fue registrado, intenta nuevamente con uno distinto</strong></div>';
                        }else{
                            try{
                                $queryInsert="INSERT INTO users (nombre, apellido, email, pass, categoria, host, date_time) VALUES (:nombre, :apellido, :email, :pass, :cat, :host, CURRENT_TIMESTAMP)";
                                $resultado=$base->prepare($queryInsert);
                                $resultado->bindParam(":email", $email, PDO::PARAM_INT);
                                $resultado->bindParam(":nombre", $nombre, PDO::PARAM_INT);
                                $resultado->bindParam(":apellido", $apellido, PDO::PARAM_INT);
                                $resultado->bindParam(":categoria", $categoria, PDO::PARAM_INT);
                                $resultado->bindParam(":pass", $pass, PDO::PARAM_INT);
                                $resultado->bindParam(":cat", $cat, PDO::PARAM_INT);
                                $resultado->bindParam(":host", $host, PDO::PARAM_INT);

                                $resultado->execute();
                            
                                echo    '<div class="mx-auto text-center mb-4 p-2">
                                            <strong>Ya estas registrado! por favor inicia sesión con tus datos</strong>
                                        </div>';
                            }catch (PDOException $e) {
                                $e->getMessage();
                                echo    '<div class="mx-auto text-center mb-4 p-2">
                                            <h3>No puedes inyectar código 😉</h3>
                                        </div>';
                            }
                        }
                    }catch (PDOException $e) {
                        $e->getMessage();
                    }
                }
            }
        ?>
        <div class="text-center p-4">
            <h1>Crear Cuenta</h1>
        </div>
        <div id="form" class="mx-auto" style="width: 40rem;">
            <form class="row g-3 needs-validation" method="POST" novalidate>
                <div class="row">
                    <div class="col p-2">
                        <input class="form-control" type="text" name="nombre" placeholder="Nombre" aria-label="Nombre" required>
                        <div class="invalid-feedback">
                            Por favor introduce un nombre
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <input class="form-control" type="text" name="apellido" placeholder="Apellido" aria-label="Apellido" required>
                        <div class="invalid-feedback">
                            Por favor introduce un apellido
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <input class="form-control" type="text" name="email" placeholder="Correo" aria-label="Email" required>
                        <div class="invalid-feedback">
                            Por favor introduce un email válido
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <input class="form-control" type="password" name="pass" placeholder="Contraseña" aria-label="Password" required>
                        <div class="invalid-feedback">
                            Por favor introduce una contraseña
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <select class="form-select" type="text" name="cat" required>
                            <option selected disabled value="">Elige una categoría...</option>
                            <option value="Público general">Público general</option>
                            <option value="Orador">Orador</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor elige una categoría
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2 text-center">
                        <input class="btn btn-green" type="submit" name="registroBtn" value="Registrarse"></input>
                    </div>
                </div>
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
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
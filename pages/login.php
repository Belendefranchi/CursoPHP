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
        include("conexion.php");
        session_start();
        if (isset($_SESSION["login"])){
            header("location: loginOK.php");
        }
        if (isset($_REQUEST["loginBtn"])){
            $email = $_REQUEST["email"];
            $pass = $_REQUEST["pass"];

            if ($email and $pass){
                try{
                    $query="SELECT * FROM users WHERE email=:email AND pass=:pass";
                    $resultado=$base->prepare($query);
                    $resultado->bindValue(":email", $email); 
                    $resultado->bindValue(":pass", $pass);
                    $resultado->execute();

                    $numero_registro=$resultado->rowCount();
                    
                    if ($numero_registro!=0){
                        $_SESSION["login"] = $email;
                        header("location: loginOK.php");
                    }else{
                        $error = "Correo electrónico y/o contraseña incorrectos";
                        echo '<div class="text-center mb-4"><strong>'.$error.'</strong></div>';
                    }
                }catch (PDOException $e) {
                    $e->getMessage();
                }
            }
        }
        ?>
        <div class="text-center p-4">
            <h1>Inicia Sesión</h1>
        </div>
        <div id="form" class="mx-auto" style="width: 40rem;">
            <form class="row g-3 needs-validation" method="POST" novalidate>
                <div class="row">
                    <div class="col p-2">
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="email" placeholder="Correo" required>
                            <div class="invalid-feedback">
                                Por favor introduce un email válido
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <div class="input-group has-validation">
                            <input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
                            <div class="invalid-feedback">
                                Por favor introduce tu contraseña
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <input class="btn btn-green" type="submit" name="loginBtn" value="Inciar Sesión"></input>
                </div>
            </form>
            <div class="row">
                <div class="col p-2 text-center">
                    <p>¿No tienes una cuenta?</p>
                    <a class="nav-link links--final" aria-current="page" href="registro.html">Regístrate</a>
                </div>
            </div>
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
<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['id_cargo'])) {
?>

    <?php
    include("db.php");
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SOPORTE MAVEPO</title>
        <link rel="shortcut icon" href="img/MSF.png" type="image/x-icon">
        <a href="./welcome.php">
            <link rel="shortcut icon" href="./img/logo_verden.ico" type="image/x-icon">
        </a>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/main.css">
        <script src="./js/main.js"></script>
    </head>

    <nav class="navbar bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="welcome.php">
                <img src="./img/MSF_BLANCO.png" height="70" class="d-inline-block align-text-top">
            </a>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="./welcome.php">Inicio</a>
                            </li>
                            <?php
                            if ($_SESSION['id_cargo'] == 1) {
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sistemas
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="solicitudes.php">Solicitudes</a></li>
                                        <li><a class="dropdown-item" href="mantenimientos_sistemas.php">Mantenimientos</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="usuarios.php">Usuarios</a></li>
                                        <li><a class="dropdown-item" href="#">Comentarios</a></li>
                                        <li><a class="dropdown-item" href="#">Registro Papeleria</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Talento Humano
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="citas_gth.php">Generar cita</a></li>
                                        <li><a class="dropdown-item" href="#">Generar solicitud de vacaciones</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Mantenimiento
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Orden de Mantenimiento</a></li>
                                    </ul>
                                </li>

                            <?php } ?>

                            <?php

                            if ($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5) {

                            ?>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Sistemas
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"> Mis solicitudes</a></li>
                                        <li><a class="dropdown-item" href="#">Mis mantenimientos</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    </ul>
                                </li>

                                <?php

                                if ($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5 || $_SESSION['id_cargo'] == 6) {

                                ?>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Talento Humano
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Formato Solicitud de vacaciones </a></li>
                                            <li><a class="dropdown-item" href="#">Formato Incidencia </a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="./citas_gth.php">Generar Cita</a></li>
                                            <li><a class="dropdown-item" href="#">Mis Recibos de nómina</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>



                            <?php } ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sesión
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./perfil_usuario.php">Perfil de Usuario</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="./logout.php">Cerrar Sesión</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </nav>

    <body>

        <section class="container">

            <br>

            <div class="citas">
                <h1 class="citas_th">Registro de Mantenimientos a Equipos de Cómputo</h1>
            </div>

            <br>
            <br>


            <section id="container">

                <br>

                <form action="#" method="POST">
                    <label for="basic-par" class="form-label">Datos del Usuario: </label>

                    <div class="input-group mb-3">

                        <span class="input-group-text" id="basic-addon1">Correo Electrónico: </span>
                        <input type="text" name="user_name" class="form-control" aria-describedby="bassic-addon2">

                    </div>

                    <div class="input-group mb-3">

                        <span class="input-group-text" id="basic-addon1" disabled>ID del Equipo: </span>
                        <input type="text" name="user_name" class="form-control" aria-describedby="bassic-addon2">

                        <span class="input-group-text" id="basic-addon1" disabled>Marca del Equipo: </span>
                        <input type="text" name="user_name" class="form-control" aria-describedby="bassic-addon2">

                    </div>


                    <br>
                    <button type="submit" name="save_usr" class="btn btn-danger">Registrar</button>

                </form>

                <br>



            </section>


        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#name').change(function() {
                    var name = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: 'getUserData.php',
                        data: {
                            name: name
                        },
                        success: function(response) {
                            var data = JSON.parse(response);
                            $('#no_empleado').val(data.no_empleado);
                            $('#user_name').val(data.user_name);
                            $('#sucursal').val(data.sucursal);
                            $('#area').val(data.area);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>
    </body>

    </html>

<?php
} else {
    header("Location: ./index.html");
    exit();
}
?>
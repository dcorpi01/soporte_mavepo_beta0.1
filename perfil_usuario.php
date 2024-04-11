<?php 
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['id_cargo']) && isset($_SESSION['area']) && isset($_SESSION['sucursal'])){

?>

<?php 
    include("db.php")
?>

<!DOCTYPE html>
<html lang="es">

    <?php include("./includes/header.php");?>
    <?php include("./includes/navbar.php");?>

<head>
    <style>
        .perfil{
            text-align: center;
            height: 300px;
            padding: 120px;
            background-image: url("./img/fondo_perfil.jpg");
            background-size: cover;
            background-repeat: no-repeat; 
        }

        .avatar{
            border-radius: 50%;
        }

        .name_user{
            font-size: 18px;
            margin-top: 14px;
        }

        section#container{
            width: 600px; /* Ancho del contenedor */
            margin: 0 auto; /* Centrar el contenedor en la página */
            padding: 20px;
        }

        /* Estilos para el apartado de cambio de contraseña */
        .cambio-contrasena {
            text-align: center;
            margin-top: 20px;
        }

        /* Estilos para el enlace de cambio de contraseña */
        .cambio-contrasena a {
            color: #007bff;
            text-decoration: none;
        }

        /* Estilos para el enlace de cambio de contraseña al pasar el cursor por encima */
        .cambio-contrasena a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

    </style>
</head>

<body>

    <section id="container">

        <div class="perfil">
            <img src="./img/LOGO_MAF2024.png" class="avatar" height="120">
            <h1 class="name_user">Perfil del Usuario: <?php echo $_SESSION['name'];?></h1>
            <br>
        </div>

        <br>
        <br>

        <form>
        <label for="basic-par" class="form-label">Los siguientes datos no se pueden modificar.</label>    

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nombre de Usuario: </span>
            <input type="text" class="form-control" value="<?php echo $_SESSION['name'];?>" aria-describedby="basic-addon1" disable readonly>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Correo Electrónico: </span>
            <input type="text" class="form-control" value="<?php echo $_SESSION['user_name'];?>" aria-describedby="basic-addon2" disable readonly>
        </div>

        <div class="mb-3">
            <label for="basic-url" class="form-label">Área: </label>
        <div class="input-group">
            <input type="text" class="form-control" id="basic-url" value="<?php echo $_SESSION['area'];?>" aria-describedby="basic-addon3 basic-addon4" disable readonly>
        </div>

        <div class="mb-3">
            <br>
            <label for="basic-url" class="form-label" id="basic-url">Sucursal: </label>
        <div class="input-group">
            <input type="text" class="from-control" id="basic-url" value="<?php echo $_SESSION['sucursal']?>" aria-describedby="basic-addon3 basic-addon4" disable readonly>
        </div>
        
        <div class="cambio-contrasena">
            <h3>¿Necesitas cambiar tu contraseña?</h3>
            <p>Si deseas cambiar tu contraseña, puedes hacerlo <a href="./contraseña.php">aquí</a>.</p>
            <p>Para poder hacer cambios en tu perfil, comunicate al correo <a href="mailto: david.corpi@mavepo.com.mx">david.corpi@mavepo.com.mx</a></p>
        </div>
        </div>

        </form>

    </section>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
}else{
    header("Location: ./index.html");
    exit();
}
?>
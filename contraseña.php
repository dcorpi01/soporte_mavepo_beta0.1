<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("./includes/header.php");?>
    <?php include("./includes/navbar.php");?>
    <title>Cambiar contraseña | INTRAVERDEN</title>
</head>
<body>

    <header>
        <div class="header">
            <h1 class="pape">Cambiar mi contraseña</h1>
        </div>
    </header>

    <style>

    section#container{
            width: 500px; /* Ancho del contenedor */
            margin: 0 auto; /* Centrar el contenedor en la página */
            padding: 20px;
        }
    
    .label_p{
        color: aliceblue;
        font-size: 20px;
    }

    </style>

    <br>
    <br>

    <section id="container">
		
    <div>

        <form class="form-control bg-dark" action="btn_cambiar.php" method="post" style="text-align: center;">

            <?php if (isset($_GET['error'])) { ?>
                <p class="alert alert-danger" role="alert"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="alert alert-success" role="alert"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            
            <div class="form-group">
            <label class="label_p"> Contraseña Anterior: </label><br>
            <input type="text" name="op" placeholder="Contraseña Antigua" required><br>
            </div>

            <div class="form-group">
            <label class="label_p"> Contraseña Nueva: </label><br>
            <input type="text" name="np" placeholder="******" class="form-group" required><br>
            </div>
            
            <div class="form-group">
            <label class="label_p"> Confirmar Contraseña Nueva: </label><br>
            <input type="text" name="c_np" placeholder="******" class="form-group" required><br>
            </div>

            <br>

            <button type="submit" class="btn btn-danger">Cambiar</button>
            <a href="perfil_usuario.php" class="btn btn-secondary" style="margin: auto;">Inicio</a>
            
        </form>
        
        </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>

<?php 

        }else{
            header("Location:login.php");
            exit();
        }
?>
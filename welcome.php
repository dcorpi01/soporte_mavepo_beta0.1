<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['id_cargo'])){


 ?>

 <?php 
    include("db.php");
 ?>

<!DOCTYPE html>
<html lang="es">

    <?php include("./includes/header.php");?>
    <?php include("./includes/navbar.php");?>

<body>

        <div class="bienvenida" style="margin-top: 300px; text-align: center;">
            <ul>
                <li>
                    <img src="./img/MSF_BLANCO.png" height="60">
                    <br>
                    
                    <br>
                    <h1 style="font-size: 60px; color: aliceblue;">Bienvenido, <?php echo $_SESSION['name']; ?></h1>
                </li>
            </ul>
        </div>
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
 }else{
    header("Location: ./index.html");
    exit();
 }
   ?>
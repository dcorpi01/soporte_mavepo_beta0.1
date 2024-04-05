<?php 
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['id_cargo']) && isset($_SESSION['area'])){ 

?>


<!DOCTYPE html>
<html lang="en">

    <?php include("./includes/header.php");?>
    <?php include("./includes/navbar.php");?>

<body>

    <section id="container">

        <br>
        <br>

        <h1 style="margin-left: 20px;">Registro de Papelería</h1>

        <br>
        <br>

        <form action="">
            <div>
                <div>
                    <span>Nombre: </span>
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
    }

?>
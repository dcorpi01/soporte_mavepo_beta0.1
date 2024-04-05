<?php 
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['id_cargo']) && isset($_SESSION['area'])){
?>

<?php 
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

    <title>Sistema de Citas | INTRAVERDEN</title>
    <?php include("./includes/header.php"); ?>
    <?php include("./includes/navbar.php"); ?>

<head>
    <style>

        .citas_th{
            margin-top: 10px;
            text-align: center;
        }

        .form_search{
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            float: left;
            background: initial;
            padding: 10px;
            border-radius: 10px;
        }

        .form_search #btn_cita{
            font-weight: bold;
            text-align: center;
            border: 0;
            cursor: pointer;
            float: right;
            margin-left: 30px;
        }
    </style>
</head>
<body>
    
    <section class="container">

        <div class="citas">
            <h1 class="citas_th">Sistema de generación de citas para G. Talento Humano</h1>
        </div>

        <br>
        <br>

        <form action="#" method="GET" class="form_search"> <!--buscar solicitud-->

            <h4>Citas generadas: </h4>
            <br>
            <a href="form_citas.php" id="btn_cita" class="btn btn-danger">Generar Cita</a>
        </form>


        <div class="table">
            <table class="table align-middle table">
                <thead class="tabe-dark">
                    <tr style="color: aliceblue;">
                        <th>No. de cita</th>
                        <th>Empleado</th>
                        <th>Área</th>
                        <th>Puesto</th>
                        <th>Visita</th>
                        <th>Fecha</th>
                        <th>Hora Asignada</th>
                    </tr>
                </thead>
                <!--Se deja espacio para hacer el paginador.-->



                <tbody class="table-light">
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>

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
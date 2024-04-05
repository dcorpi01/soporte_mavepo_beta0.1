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

        .form_search #btn_search{
            font-weight: bold;
            padding: 0 20px;
            border: 0;
            cursor: pointer;
            float: right;
            margin-left: 30px;
        }

        section#container{
            width: 700px; /* Ancho del contenedor */
            margin: 0 auto; /* Centrar el contenedor en la página */
            padding: 20px;
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

    
        <section id="container">

        <br>

        <form action="./btn_agendar.php" method="POST">
            <label for="basic-par" class="form-label">Datos del Empleado: </label>    

            <div class="input-group mb-3">

                <span class="input-group-text" id="basic-addon1">Nombre del empleado: </span>
                <input name="empleado" type="text" class="form-control" aria-describedby="basic-addon1">

                <span class="input-group-text" id="bassic-addon1">Puesto: </span>
                <input type="text" name="puesto" class="form-control" aria-describedby="basic-addon1">    
            
            </div>

            <div class="input-group mb-3">

                <span class="input-group-text" id="basic-addon1">Correo Electrónico: </span>
                <input type="text" name="email" class="form-control" aria-describedby="bassic-addon2">

            </div>

            <div class="input-group mb-3">

                <?php 

                    $query = mysqli_query($conn, "SELECT * FROM departamentos");
                    $result = mysqli_num_rows($query);
                
                ?>

                <span class="input-group-text" id="basic-addon1">Área o Proceso: </span>
                <select class="form-select" name="area" aria-label="Default select example">

                    <option selected>Seleccionar ---</option>
                    
                    <?php
                    
                        if($result){
                            while ($deptto = mysqli_fetch_array($query)){
                                ?>
                                    <option value="<?php echo $deptto["descripcion"]; ?>"><?php echo $deptto["descripcion"]; ?></option>
                                <?php
                            }
                        }
                    
                    ?>
                    
                </select>

            </div>

            <div class="input-group mb-3">

            <?php 

                $query2 = mysqli_query($conn, "SELECT * FROM empresa");
                $result2 = mysqli_num_rows($query2);

            ?>

                <span class="input-group-text" id="basic-addon1">Empresa: </span>
                <select name="empresa" class="form-select" aria-label="Default select example">
                    <option selected>Seleccionar ---</option>
                    
                        <?php 
                        
                            if($result2){
                                while($emp = mysqli_fetch_array($query2)){
                                    ?>
                                        <option value="<?php echo $emp["empresa"]; ?>"><?php echo $emp["empresa"]; ?></option>
                                    <?php
                                }
                            }
                        
                        ?>

                </select>

            </div>

            <label for="basic-par" class="form-label">Datos de la cita: </label>

            <div class="input-group mb-3">

                <?php 

                    $query3 = mysqli_query($conn, "SELECT * FROM talentoh");
                    $result3 = mysqli_num_rows($query3);

                ?>

                <span class="input-group-text" id="basic-addon1">Persona con quien se dirije: </span>
                <select name="visita" class="form-select" aria-label="Default select example">
                    <option selected>Seleccionar ---</option>
                        <?php 

                            if($result3){
                                while($visita = mysqli_fetch_array($query3)){
                                    ?>
                                        <option value="<?php echo $visita["nombre"]; ?>"><?php echo $visita["nombre"]; ?></option>
                                    <?php
                                }
                            }
                        
                        ?>
                </select>

            </div>

            <div class="input-group mb-4">

                <span class="input-group-text" id="bassic-addon1">Fecha de la cita: </span>
                <input type="date" name="fechacit" class="form-control" aria-describedby="basic-addon1">  

            </div>

            <div class="input-group mb-4">

                <span class="input-group-text" id="bassic-addon1">Hora de la cita: </span>
                <input type="time" name="hrcit" class="form-control" aria-describedby="basic-addon1">  

            </div>

            <div class="input-group">
                <span class="input-group-text">Motivo de la cita: </span>
                <textarea class="form-control" name="motivo" aria-label="With textarea"></textarea>
            </div>

            <button type="submit" name="save_cita" class="btn btn-success">Agendar</button>
            
        </form>

        <br>

        

    </section>


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
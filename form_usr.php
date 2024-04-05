<?php 
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['id_cargo'])){
?>

<?php 
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

    <?php include("./includes/header.php"); ?>
    <?php include("./includes/navbar.php"); ?>

    <body>
    
    <section class="container">

        <br>

        <div class="citas">
            <h1 class="citas_th">Registro de Nuevo Usario</h1>
        </div>

        <br>
        <br>

    
        <section id="container">

        <br>

        <form action="./btn_registrousr.php" method="POST">
            <label for="basic-par" class="form-label">Datos del Empleado: </label>    

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nombre Completo: </span>
                <input type="text" name="name" class="form-control" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">

                <span class="input-group-text" id="basic-addon1">Número de Empleado: </span>
                <input name="no_empleado" type="text" class="form-control" aria-describedby="basic-addon1">

                <span class="input-group-text" id="bassic-addon1">Contraseña: </span>
                <input type="password" name="password" class="form-control" aria-describedby="basic-addon1">    
            
            </div>

            <div class="input-group mb-3">

                <span class="input-group-text" id="basic-addon1">Correo Electrónico: </span>
                <input type="text" name="user_name" class="form-control" aria-describedby="bassic-addon2">

            </div>

            <div class="input-group mb-3">

                <?php 

                    $query = mysqli_query($conn, "SELECT * FROM cargo");
                    $result = mysqli_num_rows($query);
                
                ?>

                <span class="input-group-text" id="basic-addon1">Tipo de Usuario: </span>
                <select class="form-select" name="id_cargo" aria-label="Default select example">

                    <option selected>Seleccionar ---</option>
                    
                    <?php
                    
                        if($result){
                            while ($deptto = mysqli_fetch_array($query)){
                                ?>
                                    <option value="<?php echo $deptto["id"]; ?>"><?php echo $deptto["descripcion"]; ?></option>
                                <?php
                            }
                        }
                    
                    ?>
                    
                </select>

            </div>

            <div class="input-group mb-3">

            <?php 

                $query2 = mysqli_query($conn, "SELECT * FROM sucursal");
                $result2 = mysqli_num_rows($query2);

            ?>

                <span class="input-group-text" id="basic-addon1">Sucursal: </span>
                <select name="sucursal" class="form-select" aria-label="Default select example">
                    <option selected>Seleccionar ---</option>
                    
                        <?php 
                        
                            if($result2){
                                while($emp = mysqli_fetch_array($query2)){
                                    ?>
                                        <option value="<?php echo $emp["sucursal"]; ?>"><?php echo $emp["sucursal"]; ?></option>
                                    <?php
                                }
                            }
                        
                        ?>

                </select>
                </div>

                <div class="input-group mb-3">

                <?php 

                    $query2 = mysqli_query($conn, "SELECT * FROM departamentos");
                    $result2 = mysqli_num_rows($query2);

                ?>

                <span class="input-group-text" id="basic-addon1">Área: </span>
                <select name="area" class="form-select" aria-label="Default select example">
                    <option selected>Seleccionar ---</option>
                    
                        <?php 
                        
                            if($result2){
                                while($emp = mysqli_fetch_array($query2)){
                                    ?>
                                        <option value="<?php echo $emp["descripcion"]; ?>"><?php echo $emp["descripcion"]; ?></option>
                                    <?php
                                }
                            }
                        
                        ?>

                </select>

            </div>

            <br>
            <button type="submit" name="save_usr" class="btn btn-danger">Registrar</button>
            
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
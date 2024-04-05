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

<br>

<body style="color: white;">

<section id="container">
    <h1 style="margin-left: 30px;">Registro de Mantenimiento - SISTEMAS MAVEPO</h1>

    <br>

    <div class="container">
        <form class="d-flex" role="search" action="#" method="GET">
            <input type="search" class="form-control me-4" placeholder="Buscar Registro" aria-label="Search">
            <button class="btn btn-outline-danger" type="submit">Buscar</button>
            <a href="nuevo_mant.php" id="btn_usr" class="btn btn-danger" style="margin-left: 15px;">Nuevo</a>
        </form>
    </div>

    <br>
    <br>

    <div class="table-responsive">
  <table class="table align-middle table">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>ID Equipo</th>
        <th>Marca</th>
        <th>Tipo de Mantenimiento</th>
        <th>Fecha Programada</th>
        <th>Correo Electrónico</th>
        <th>Estado</th>
        <th>Descripción</th>
        <th>Sucursal</th>
        <th>Fecha Actualización</th>
      </tr>
    </thead>

    <tbody class="table-light">
                <?php 
                $mant_a = "SELECT * FROM mantenimiento ORDER BY id DESC";
                $result_admin = mysqli_query($conn, $mant_a);

                while($row = mysqli_fetch_array($result_admin)) { ?> 

                <div class="form-group">
                    <div class="table-content">
                        <tr>

                            <?php $id9 = $row['id'] ?>
                            <?php $eq = $row['equipo']?>
                            <?php $mark = $row['marca']?>
                            <?php $mant9 = $row['mantenimiento'] ?>
                            <?php $fecha9 = $row['fecha'] ?>
                            <?php $usu9 = $row['usuario'] ?>
                            <?php $msg9 = $row['descripcion']?>
                            <?php $suc9 = $row['sucursal']?>
                            <?php $fechac9 = $row['fechac']?>

                            <td style="font-weight: bold;"><?php echo $id9?></td>
                            <td><?php echo $eq?></td>
                            <td style="font-weight: bold;"><?php echo $mark?></td>
                            <td style="color: black;"><?php echo $mant9?></td>
                            <td style="font-weight: bold;"><?php echo $fecha9?></td>
                            <td class="td1" style="font-weight: bold;" ><?php echo $usu9?></td>
                            <td>
                                <form action="update_mantadm.php" method="post">
                                    <select name="status_fin" class="form-control">
                                        <option value="" selected> </option>
                                        <option value="1" <?php if($row['a_mstatus']==1){echo "selected";} ?>>Asignado</option>
                                        <option value="2" <?php if($row['a_mstatus']==2){echo "selected";} ?>>En Proceso</option>
                                        <option value="3" <?php if($row['a_mstatus']==3){echo "selected";} ?>>Realizado</option>
                                    </select>
                                    <input type="radio" style="display:none;" id="id_fin" name="id_fin" value="<?php echo $id9; ?>" checked hidden>
                                    <div class="col-sm-6">
                                        <input type="submit" name="guardar" class="btn_new" style="margin: auto;" value="Guardar">
                                    </div>
                                </form>
                            </td>
                            <td style="color: black;"><?php echo $msg9?></td>
                            <td style="color: black;"><?php echo $suc9?></td>
                            <td style="color: black;"><?php echo $fechac9?></td>
                        </tr>
                    </div>
                </div>
                <?php }?>
            </tbody>
        </table>
        
    </div>
    

</section>
    
</body>
</html>



<?php
 }else{
    header("Location: ./index.html");
    exit();
 }
   ?>
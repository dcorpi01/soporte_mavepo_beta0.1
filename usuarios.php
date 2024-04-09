<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name']) && isset($_SESSION['id_cargo'])){


?>

<?php 
    include("db.php");
?>  

<!DOCTYPE html>
<html lang="es">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
        <?php include("./includes/header.php")?>
        <?php include("./includes/navbar.php")?>
<br>

<body style="color: white;">

<section id="container">
    <h1 style="margin-left: 30px;">Información de Usarios - MAVEPO</h1>

    <br>

    <div class="container">

        <form class="d-flex" role="search" action="#" method="get">
            <input type="search" class="form-control me-4" placeholder="Buscar Usuario" aria-label="Search">
            <button class="btn btn-outline-danger" type="submit">Buscar</button>
            <a href="form_usr.php" id="btn_usr" class="btn btn-danger" style="margin-left: 15px;">Nuevo</a>
        </form>
    </div>

    <br>
    <br>

    <div class="table-responsive">
        <table class="table align-middle table">
            <thead class="table-dark">
                <tr>
                    <th>No. de Empleado</th>
                    <th>Correo Electrónico</th>
                    <th>Nombre</th>
                    <th>Sucursal</th>
                    <th>Área</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>

            <tbody class="table-light">
                <?php 
                    $usr_a = "SELECT * FROM users ORDER BY id ASC";
                    $result_usr = mysqli_query($conn, $usr_a);

                    while ($row_usr = mysqli_fetch_array($result_usr)) { ?>

                    <div class="form-group">
                        <div class="table-content">
                            <tr>

                                <?php $id10 = $row_usr['id'] ?>
                                <?php $nemp = $row_usr['no_empleado'] ?>
                                <?php $uname = $row_usr['user_name'] ?>
                                <?php $name = $row_usr['name'] ?>
                                <?php $suc = $row_usr['sucursal'] ?>
                                <?php $area = $row_usr['area'] ?>

                                <td style="font-weight: bold;"><?php echo $nemp?></td>
                                <td><?php echo $uname?></td>
                                <td style="font-weight: bold;"><?php echo $name?></td>
                                <td><?php  echo $suc?></td>
                                <td><?php echo $area?></td>

                                <td>
                                <form action="delete_user.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id10?>">
                                    <button type="submit" name="delete_usr" class="btn btn-danger">Borrar</button>
                                </form>
                                </td>
                                <td>
                                <form action="edit_user.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $id10?>">
                                    <button type="submit" name="edit" class="btn btn-secondary">Editar</button>
                                </form>
                                </td>
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
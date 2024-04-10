<?php
include("db.php");

if(isset($_POST['id']) && isset($_POST['no_empleado']) && isset($_POST['name'])){
    $id10 = intval($_POST['id']);

    $sql = "SELECT * FROM users WHERE id=$id10";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){
        while($row_usr = mysqli_fetch_array($result)){
            $id10 = $row_usr['id'];
            $nemp = $row_usr['no_empleado'];
            $uname = $row_usr['user_name'];
            $name = $row_usr['name'];
            $suc = $row_usr['sucursal'];
            $area = $row_usr['area'];
        }
    }
}
?>

<h2>Editar usuario: <?php echo $name;?></h2>

<form action="update_user.php" method="POST">
    <div class="form-group">
        <label for="no_empleado">No. de empleado</label>
        <input type="text" class="form-control" name="no_empleado" id="no_empleado" value="<?php echo $nemp;?>">
    </div>
    <div class="form-group">
        <label for="user_name">Nombre de usuario</label>
        <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $uname;?>">
    </div>
    <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $name;?>">
    </div>
    <div class="form-group">
        <label for="sucursal">Sucursal</label>
        <input type="text" class="form-control" name="sucursal" id="sucursal" value="<?php echo $sucursal;?>">
    </div>
    <div class="form-group">
        <label for="area">Área</label>
        <input type="text" class="form-control" name="area" id="area" value="<?php echo $area;?>">
    </div>
    <input type="hidden" name="id" value="<?php echo $id10;?>">
    <button type="submit" name="editar" class="btn btn-primary">Guardar cambios</button>
    &nbsp;
    <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
</form>
<?php
include("db.php");

if(isset($_POST['id']) && isset($_POST['id'])){
    $id10 = intval($_POST['id']);

    $sql = "SELECT * FROM users WHERE id=$id10";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $no_empleado = $row["no_empleado"];
            $user_name = $row["user_name"];
            $name = $row["name"];
            $sucursal = $row["sucursal"];
            $area = $row["area"];
        }
    }
}
?>

<h2>Editar usuario: <?php echo $name;?></h2>

<form action="update_user.php" method="POST">
    <div class="form-group">
        <label for="no_empleado">No. de empleado</label>
        <input type="text" class="form-control" name="no_empleado" id="no_empleado" value="<?php echo $no_empleado;?>">
    </div>
    <div class="form-group">
        <label for="user_name">Nombre de usuario</label>
        <input type="text" class="form-control" name="user_name" id="user_name" value="<?php echo $user_name;?>">
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
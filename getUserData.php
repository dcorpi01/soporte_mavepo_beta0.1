<?php

include('db.php');

if(isset($_POST['name']) &&!empty($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "SELECT * FROM users WHERE name='$name'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)) {
            $no_empleado = $row["no_empleado"];
            $user_name = $row["user_name"];
            $sucursal = $row["sucursal"];
            $area = $row["area"];

            echo json_encode(array('no_empleado' => $no_empleado, 'user_name' => $user_name, 'sucursal' => $sucursal, 'area' => $area));
        }
    }
}

?>
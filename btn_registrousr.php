<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
include("db.php");

if(isset($_POST['save_usr'])){

    $nemp2 = $_POST['no_empleado']; //Nombres inputs
    $uname2 = $_POST['user_name'];
    $passw = $_POST['password'];
    $nombre90 = $_POST['name'];
    $user = $_POST['usuario'];
    $sucu = $_POST['sucursal'];
    $cargo = $_POST['id_cargo'];
    $area = $_POST['area'];
    $status = $_POST['status'];

    $conf = "INSERT INTO users(no_empleado, user_name, password, name, usuario, sucursal, id_cargo, area) VALUES ('$nemp2', '$uname2','$passw', '$nombre90', '$user', '$sucu', '$cargo', '$area')";
    $result = mysqli_query($conn, $conf);
    if(!$result) {
        die("Query Failed");
    }

    header("Location: index.html");

}

}else{
    header("Location: index.html");
    exit();
}

?>
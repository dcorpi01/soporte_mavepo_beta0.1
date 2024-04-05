<?php 
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
include("db.php");

if(isset($_POST['save_cita'])){

    $empleado = $_POST['empleado']; //Nombres inputs
    $puesto = $_POST['puesto'];
    $correo = $_POST['email'];
    $area = $_POST['area'];
    $empresa = $_POST['empresa'];
    $visita = $_POST['visita'];
    $fechacita = $_POST['fechacit'];
    $horacita = $_POST['hrcit'];
    $motivo = $_POST['motivo'];

    $conf = "INSERT INTO citas_gth(empleado, email, area, puesto, visita, fecha, hora, motivo) VALUES ('$empleado', '$correo','$area', '$puesto', '$visita', '$fechacita', '$horacita', '$motivo')";
    $result = mysqli_query($conn, $conf);
    if(!$result) {
        die("Query Failed");
    }

    echo'LISTO!';

}

}else{
    header("Location: index.html");
    exit();
}

?>
<?php

include("db.php");

if(isset($_POST['id'])){

    $id10 = $_POST['id'];

    $sql = "DELETE FROM users WHERE id=$id10";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: usuarios.php");
    }else{
        echo "<script>alert('Error al borrar usuario');</script>";
    }
}
?>
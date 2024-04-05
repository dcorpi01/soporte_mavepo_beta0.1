<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

        include "db.php";

    if(isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $op = validate($_POST['op']);
        $np = validate($_POST['np']);
        $c_np = validate($_POST['c_np']);

        if(empty($op)){
            header("Location:contraseña.php?error=La contraseña anterior es requerida");
            exit();
        }else if(empty($np)){
            header("Location:contraseña.php?error=La nueva contraseña es requerida");
            exit();
        }else if($np !== $c_np){
            header("Location:contraseña.php?error=Las nuevas contraseñas no coinciden");
            exit();
        }else{
            
            $op = ($op);
            $np = ($np);
            $id = $_SESSION['id'];


            $sql = "SELECT password FROM users WHERE id = '$id' AND password = '$op'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                
                $sql_2 = "UPDATE users SET password = '$np' WHERE id = '$id'";

                mysqli_query($conn, $sql_2);
                header("Location:contraseña.php?success=Tu contraseña se cambio exitosamente");
                exit();

            }else{
                header("Location:contraseña.php?error=Contraseña incorrecta");
                exit();
            }
        }

}else{
    header("Location:contraseña.php");
    exit();
}



}else{
    header("Location:index.html");
    exit();
}
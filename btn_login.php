<?php
    $alert = '';
    session_start();
    include('db.php');
        if(isset($_POST['email']) && isset($_POST['password'])){

            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $email = validate($_POST['email']);
            $pass = validate($_POST['password']);

            if(empty($email)){
                header("Location: index.html?error=Usuario requerido");
                exit();
            }else if(empty($pass)){
                header("Location: index.html?error=Contraseña requerida");
                exit();
            }else{
                $sql1 = "SELECT * FROM users WHERE user_name='$email' AND password='$pass'";

                $result1 = mysqli_query($conn, $sql1);

                if(mysqli_num_rows($result1) === 1){
                    $row = mysqli_fetch_assoc($result1);

                    if($row['user_name'] === $email && $row['password'] === $pass){
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id_cargo'] = $row['id_cargo'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['area'] = $row['area'];

                        header('location: welcome.php');

                    }else if ($pass !== ['password']){
                        $alert = '<p>Contraseña incorrecta</p>';
                    }

                }else{
                    $alert = 'El usuario o la clave son incorrectos';
                    header("Location: index.html?error=Usuario o contraseña incorrecto");
                    exit();
                }
            }
        }
?>
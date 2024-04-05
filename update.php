<?php 

    include ("db.php");

    if(isset($_POST['save'])){
        $status = $_POST['status_final'];
        $id = $_POST['id_final'];
        date_default_timezone_set('america/mexico_city');
        $date12=date('Y-m-d h:i', time());

        $update = mysqli_query($conn, "UPDATE solicitud SET d_status= '$status', fechaac = '$date12' WHERE id=$id");
				if($update){
                    header("Location: solicitudes.php");
                }else{
                    echo 'ERROR';
                }
			}
?>
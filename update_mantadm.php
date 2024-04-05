<?php 

    include ("db.php");

    if(isset($_POST['guardar'])){
        $status = $_POST['status_fin'];
        $id = $_POST['id_fin'];
        date_default_timezone_set('america/mexico_city');
        $date=date('Y-m-d h:i', time());

        $update = mysqli_query($conn, "UPDATE mantenimiento SET a_mstatus = '$status', fechac = '$date' WHERE id=$id");
				if($update){
                    header("Location: mantenimientos_sistemas.php");
                }else{
                    echo 'ERROR';
                }
			 }
?>
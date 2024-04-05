<?php
 
session_start();
if($_SESSION['id_cargo'] != 1){
    header("location: ./bienvenida.php");
}

    include "db.php"

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <link rel="icon" href="LOGO_VERDEN_H.png">
	<title>Solicitudes | INTRAVERDEN</title>
    <link rel="stylesheet" type="text/css" href="css/stylerh.css">
    <?php include "functions.php"; ?>
</head>
<body>
<header>
		
<?php include("./includes/header.php");?>
<?php include("./includes/navbar.php");?>

	<section id="container">
        <?php 
        
            $busqueda = strtolower($_REQUEST['busqueda']);
            if(empty($busqueda)){
                header("location: solicitudes.php");
            }
        
        ?>
		<h1>Solicitudes</h1>

        <div class="container">
        <form class="d-flex" role="search" action="buscar_solicitud.php" method="GET">
            <input class="form-control me-4" type="search" placeholder="Buscar Solicitud" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>

    <div class="table-responsive">
  <table class="table align-middle table">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombre Completo</th>
        <th>Área</th>
        <th>Tipo</th>
        <th>Nivel de Urgencia</th>
        <th>Fecha de Creación</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Estado (Usuario)</th>
        <th>Fecha Actualización</th>
        <th>Fecha Usuario</th>
      </tr>
    </thead>
    <?php 
                    //Paginador
                    $sql_register = mysqli_query($conn, "SELECT COUNT(*) AS total_registro FROM solicitud");
                    $result_register = mysqli_fetch_array($sql_register);

                    $total_registro = $result_register['total_registro'];

                    $por_pagina = 20;

                    if(empty($_GET['pagina'])){
                        $pagina = 1;
                    }else{
                        $pagina = $_GET['pagina'];
                    }

                    $desde = ($pagina-1) * $por_pagina;
                    $total_paginas = ceil($total_registro / $por_pagina);
                
                    $query5 = mysqli_query($conn,"SELECT * FROM solicitud ORDER BY id DESC LIMIT $desde,$por_pagina");
                    mysqli_close($conn);
                    $result4 = mysqli_num_rows($query5);

                    if($result4 > 0){

                        while ($data = mysqli_fetch_array($query5)){

                    ?>

    <tbody class="table-light">
      <tr>

        <?php $id1=$data['id'] ?>
        <?php $nombre1=$data['nombre'] ?>
        <?php $area1 = $data['area'] ?>
        <?php $tipo1 = $data['tipo']?>
        <?php $nivel1 = $data['nivel']?>
        <?php $fecha1 = $data['fecha']?>
        <?php $desc1 = $data['descripcion']?>
        <?php $fechaac = $data['fechaac']?>
        <?php $fechaacu = $data['fechaacu']?>

      </tr>
      <tr>
        <td class="align-top table-light" style="font-weight: bold;"><?php echo $id1?></td>
        <td class="align-top table-light"><?php echo $nombre1?></td>
        <td class="align-top table-light" style="font-weight: bold;"><?php echo $area1?></td>
        <td class="align-top table-light"><?php echo $tipo1?></td>
        <td class="align-top table-light"><?php echo $nivel1?></td>
        <td class="align-top table-light" style="font-weight: bold;"><?php echo $fecha1?></td>
        <td class="align-top table-light"><?php echo $desc1?></td>
        <td>
            <form action="update.php" method="POST">

                <select name="status_final" class="form-control">
                    <option value="1" <?php if ($data ['d_status']==1){echo "selected";} ?>>Abierto</option>
                    <option value="2" <?php if ($data ['d_status']==2){echo "selected";} ?>>Cerrado</option>
                    <option value="3" <?php if ($data ['d_status']==3){echo "selected";} ?>>En Proceso</option>
                    <option value="4" <?php if ($data ['d_status']==4){echo "selected";} ?>>No Aplica</option>
                </select>

                    <input style="display:none;" type="radio" id="id_final" name="id_final" value="<?php echo $id1; ?>" checked hidden>
                        
                <div class="col-sm-6">
                    <input type="submit" name="save" class="btn btn-outline-dark" style="margin: auto;" value="Guardar">
                </div>
            </form>
        </td>

        <td style="font-weight: bold;">
          <?php 
            switch($data['u_status']){
              case 1:
                echo "Abierto";
                break;
              case 2:
                echo "Cerrado";
                break;
            }
          ?>
        </td>
        
        <td class="align-top table-light"><?php echo $fechaac?></td>
        <td style="font-weight: bold;" class="align-top table-light"><?php echo $fechaacu?></td>
      </tr>
    </tbody>
    <?php

                        }

                    }

                ?>
  </table>
  <div>
            <ul class="pagination justify-content-end">
                <?php 
                    if($pagina != 1){ 
                ?>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo 1; ?>">|<</a></li>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>

                    <?php 
                    }
                        for($i=1; $i <= $total_paginas; $i++){

                            if($i == $pagina){
                                echo '<li class="page-item">'.$i.'</li>';
                            }else{

                                echo '<li><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';

                            }   
                        }
                        if($pagina != $total_paginas){ 
                    ?>

                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina+1; ?>">>></a></li>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $total_paginas; ?>">>|</a></li>
                <?php } ?>

            </ul>
    </div>
  
</div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
		
	</section>

</body>
</html>
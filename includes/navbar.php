<nav class="navbar bg-dark navbar-dark">
        <div class="container">
          <a class="navbar-brand" href="welcome.php">
            <img src="./img/MSF_BLANCO.png" height="70" class="d-inline-block align-text-top">
          </a>
          <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="./welcome.php">Inicio</a>
                  </li>
                  <?php 
					          if($_SESSION['id_cargo'] == 1){
                  ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sistemas
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="solicitudes.php">Solicitudes</a></li>
                        <li><a class="dropdown-item" href="mantenimientos_sistemas.php">Mantenimientos</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="usuarios.php">Usuarios</a></li>
                        <li><a class="dropdown-item" href="#">Comentarios</a></li>
                        <li><a class="dropdown-item" href="#">Registro Papeleria</a></li>
                    </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Talento Humano
                        </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="citas_gth.php">Generar cita</a></li>
                        <li><a class="dropdown-item" href="#">Generar solicitud de vacaciones</a></li>                      
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Mantenimiento
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Orden de Mantenimiento</a></li>
                    </ul>
                    </li>
                    
                  <?php }?>

                  <?php 
                  
                      if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 3 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5){

                  ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sistemas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"> Mis solicitudes</a></li>
                                <li><a class="dropdown-item" href="#">Mis mantenimientos</a></li>
                                <li><hr class="dropdown-divider"></li>
                            </ul>
                        </li>    
                    
                  <?php 
                  
                      if($_SESSION['id_cargo'] == 2 || $_SESSION['id_cargo'] == 4 || $_SESSION['id_cargo'] == 5 || $_SESSION['id_cargo'] == 6){

                  ?>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Talento Humano
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Formato Solicitud de vacaciones </a></li>
                                <li><a class="dropdown-item" href="#">Formato Incidencia </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="./citas_gth.php">Generar Cita</a></li>
                                <li><a class="dropdown-item" href="#">Mis Recibos de nómina</a></li>
                            </ul>
                        </li>   
                  <?php }?>



                  <?php }?>

                  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sesión
                        </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="./perfil_usuario.php">Perfil de Usuario</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="./logout.php">Cerrar Sesión</a></li>
                    </ul>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </nav>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 ); ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" width="35" class="user-image img-circle">';

					}else{

						echo '<img src="vita/im/usuarios/default/user-md.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 ); ">
          <a href="salir" class="dropdown-item text-danger">
            <i class="fas fa-sign-out-alt"></i> Salir
          </a>
        </div>
      </li>
    </ul>
  </nav>

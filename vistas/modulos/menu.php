  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0,  #343a40,  #343a40, #343a40, #343a40 );">

        <a href="inicio" class="brand-link">
        <img src="vistas/img/plantilla/logo.jfif" class="brand-image img-circle elevation-3" style="width: 40px">
        <span class="brand-text font-weight-light"><b>APRS S.A.C</b></span>
        </a>


        <div class="sidebar">
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="vistas/img/usuarios/user1-128x128.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">Dr. Daniel Ñañez</a>
            </div>
        </div> -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
				if($_SESSION["perfil"] == "Administrador"){

					echo '<li class="nav-item active">
							<a href="inicio" class="nav-link">
							<i class="nav-icon fas fa-home"></i>
							<p>Inicio</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="usuarios" class="nav-link">
							<i class="nav-icon fas fa-user-md"></i>
							<p>Usuarios</p>
							</a>
						</li>';

				}
				if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

					echo '<li class="nav-item">
							<a href="categorias" class="nav-link">
							<i class="fas fa-th"></i>
							<p>Categorias</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="productos" class="nav-link">
							<i class="fas fa-heartbeat"></i>
							<p>Productos</p>
							</a>
						</li>';

				}

				if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

					echo '<li class="nav-item">
							<a href="clientes" class="nav-link">
							<i class="nav-icon fas fa-users"></i>
							<p>Clientes</p>
							</a>
						</li>';

				}

				if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

					echo '<li class="nav-item">
							<a href="#" class="nav-link">
							<i class="fab fa-opencart"></i>
							<p>Ventas</p>
							</a>
							<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="ventas" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Administrar ventas</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="crear-venta" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Crear venta</p>
								</a>
							</li>
							</ul>
						</li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '<li class="nav-item">
							<a href="reportes" class="nav-link">
							<i class="fas fa-inbox"></i>
							<p>Reporte de ventas</p>
							</a>

						</li>';

					}
				echo '</ul>

			</li>';

		}

		?>
            </ul>
        </nav>
        </div>
    </aside>

	

  <?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar de reporte de ventas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Reportes de ventas</li>
          </ol>
        </div>
      </div>
    </div>
    <hr>
  </section>

   <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <button type="button" class="btn btn-default" id="daterange-btn2">
                  <span><i class="fa fa-calendar"></i> Rango de fecha</span><i class="fa fa-caret-down ml-2"></i>
                </button>  
              </div>
              <div class="col-6">
                <?php

                if(isset($_GET["fechaInicial"])){

                  echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

                }else{

                  echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

                }         

                ?>
                <button type="button" class="btn btn-success float-right">Descargar reporte en Excel</button>
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <div class="row col-md-12">
              <div class="col-md-6">
                <?php
                include "reportes/grafico-ventas.php";
                ?>
              </div>
              <div class="col-md-6 col-xs-12">
                <?php
                include "reportes/vendedores.php";
                ?>
              </div>
            </div>
            
            <div class="row col-md-12">
              <div class="col-md-6 col-xs-12">
                <?php
                include "reportes/productos-mas-vendidos.php";
                ?>
              </div>
              <div class="col-md-6 col-xs-12">
                  <?php
                  include "reportes/compradores.php";
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
  </section>
</div>
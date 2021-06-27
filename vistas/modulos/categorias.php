<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section>
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar de categorías</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administrar de categorías</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-12">
                  <button class="btn btn-info float-right" data-toggle="modal" data-target="#modalAgregarCategoria">Nueva Categoría</button>
                </div>
              </div>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped dt-responsive text-center"  width="100%">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    echo ' <tr>
                      <td>'.($key+1).'</td>
                      <td class="text-uppercase">'.$value["categoria"].'</td>
                      <td>
                        <div class="btn-group">
                                      
                          <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fas fa-edit"></i></button>';
                          if($_SESSION["perfil"] == "Administrador"){
                            echo '<button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                          }
                        echo '</div>  
                      </td>
                  </tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="modalAgregarCategoria" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form role="form" method="post" >
        <div class="modal-header text-center text-light" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 ); ">
          <h5 class="text-center"><b>Agregar nueva categoría</b></h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>         
        <div class="modal-body">
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-cubes "></i>
              </span>
            </div>
            <input type="text" class="form-control" name="nuevaCategoria" placeholder="Ingrese categoría" required>
          </div>
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Guardar</button>
        </div>
          
        <?php
          $crearCategoria = new ControladorCategorias();
          $crearCategoria->ctrCrearCategoria();
        ?>
      </form>
      </div>
    </div>
  </div>


  <!-- Editar -->
  <div class="modal fade" id="modalEditarCategoria" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      <form role="form" method="post" >
        <div class="modal-header text-center text-light" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 ); ">
          <h5 class="text-center"><b>Editar categoría</b></h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-cubes "></i>
              </span>
            </div>
            <input type="text" class="form-control" name="editarCategoria" id="editarCategoria" placeholder="Ingrese categoría" required>
            <input type="hidden"  name="idCategoria" id="idCategoria" required>
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Guardar</button>
        </div>
        
        <?php
          $crearCategoria = new ControladorCategorias();
          $crearCategoria->ctrEditarCategoria();
        ?>
      </form>
      </div>
    </div>
  </div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>

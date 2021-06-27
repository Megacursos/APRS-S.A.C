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
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar de Productos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar de Productos</li>
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
                  <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modalAgregarProducto" title="Agregar nuevo usuario">Agregar producto</button>
                </div>
              </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped dt-responsive tablaProductos text-center">
              <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Imagen</th>
                <th>Código</th>
               <th>Descripción</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
              </thead>
            </table>
            <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header text-center text-light" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 ); ">
          <h5 class="text-center"><b>Ingresar nuevo producto</b></h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-th"></i></span>
            </div>
            <select class="form-control custom-select select2"  id="nuevaCategoria" name="nuevaCategoria">
              <option selected disabled>Seleccione categoría</option>
              <?php
                $item = null;
                $valor = null;
                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                foreach ($categorias as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                }
              ?>
            </select>
          </div>

          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-laptop-code"></i></span>
            </div>
            <input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>
          </div>
          
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fab fa-product-hunt"></i></span>
            </div>
            <input type="text" class="form-control" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
          </div>

          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-shopping-bag"></i></span>
            </div>
            <input type="number" class="form-control" name="nuevoStock" min="0" placeholder="Stock" required>
          </div>
          
          <div class="row">
            <div class="input-group mb-3 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fas fa-arrow-up"></i></span>
              </div>
              <input type="number" class="form-control" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>
            </div>
            <div class="input-group mb-3 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fas fa-arrow-down"></i></span>
              </div>
              <input type="number" class="form-control" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group-prepend">
                <label><input type="checkbox" class="minimal porcentaje" checked>Utilizar procentaje</label>
              </div>
            </div>
            <div class="input-group mb-3 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fa fa-percent"></i></span>
              </div>
              <input type="number" class="form-control nuevoPorcentaje" min="0" value="40" required>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-camera "></i></span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input nuevaImagen" name="nuevaImagen">
              <label class="custom-file-label" for="exampleInputFile">Subir foto de peso máximo: 2mb</label>
            </div>
          </div>

          <div class="col-md-6">
              <img class="img-thumbnail previsualizar" src="vistas/img/productos/default/producto-default.png" width="100px">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Guardar</button>
        </div> 
    </form>
    <?php
        $crearProducto = new ControladorProductos();
        $crearProducto -> ctrCrearProducto();
      ?>
    </div>
  </div>
</div>



<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header text-center text-light" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 ); ">
          <h5 class="text-center"><b>Editar producto</b></h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-th"></i></span>
            </div>
            <select class="form-control custom-select select2"  name="editarCategoria" readonly required>
              <option id="editarCategoria">Seleccione categoría</option>
              <?php
                $item = null;
                $valor = null;
                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                foreach ($categorias as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                }
              ?>
            </select>
          </div>

          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-laptop-code"></i></span>
            </div>
            <input type="text" class="form-control" id="editarCodigo" name="editarCodigo" readonly required>
          </div>
          
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fab fa-product-hunt"></i></span>
            </div>
            <input type="text" class="form-control" id="editarDescripcion" name="editarDescripcion" required>
          </div>

          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-shopping-bag"></i></span>
            </div>
            <input type="number" class="form-control" id="editarStock" name="editarStock" min="0" required>
          </div>
          
          <div class="row">
            <div class="input-group mb-3 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fas fa-arrow-up"></i></span>
              </div>
              <input type="number" class="form-control" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>
            </div>
            <div class="input-group mb-3 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fas fa-arrow-down"></i></span>
              </div>
              <input type="number" class="form-control" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group-prepend">
                <label><input type="checkbox" class="minimal porcentaje" checked>Utilizar procentaje</label>
              </div>
            </div>
            <div class="input-group mb-3 col-md-6">
              <div class="input-group-prepend">
                <span class="input-group-text">
                <i class="fa fa-percent"></i></span>
              </div>
              <input type="number" class="form-control nuevoPorcentaje" min="0" value="40" required>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-camera "></i></span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input nuevaImagen" name="editarImagen">
              <label class="custom-file-label" for="exampleInputFile">Subir foto de peso máximo: 2mb</label>
            </div>
          </div>

          <div class="col-md-6">
              <img class="img-thumbnail previsualizar" src="vistas/img/productos/default/producto-default.png" width="100px">
              <input type="hidden" name="imagenActual" id="imagenActual">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Actualizar producto</button>
        </div> 
    </form>
    <?php
        $editarProducto = new ControladorProductos();
        $editarProducto -> ctrEditarProducto();
      ?>
    </div>
  </div>
</div>


<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>      
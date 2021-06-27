<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear venta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Crear ventas</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-6">
            <div class="card card-warning">
              <!-- <div class="card-header">
                <h3 class="card-title">LA TABLA DE PRODUCTOS</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tablaVentas">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Imagen</th>
                      <th>Código</th>
                      <th>Descripcion</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
          <!-- left column -->
          <div class="col-md-6">
            <!-- Input addon -->
            <div class="card card-info">
              <!-- <div class="card-header">
                <h3 class="card-title">Formulario de ventas</h3>
              </div> -->
              <form method="post" class="formularioVenta">
                <div class="card-body">
                  <div class="row">
                    <div class="input-group col-md-6 mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="fa fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>
                      <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">
                    </div>

                    <div class="input-group col-md-6 mb-3">
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                    <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if(!$ventas){

                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                    }else{
                      foreach ($ventas as $key => $value) {
                    
                      }
                    $codigo = $value["codigo"] + 1;
                      echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                    }
                    ?>
                    </div>
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-users"></i></span>
                    </div>
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                      <option value="">Seleccionar cliente</option>
                        <?php
                          $item = null;
                          $valor = null;
                          $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                          foreach ($categorias as $key => $value) {
                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                          }
                        ?>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar nuevo cliente</button></span>
                    </div>
                  </div>

                  
                  <div class="form-group row nuevoProducto"></div>
                    <input type="hidden" id="listaProductos" name="listaProductos">
                    <button type="button" class="btn btn-warning hidden-lg btnAgregarProducto">Agregar producto</button>
                  <hr>
                  <div class="row">
                    <div class="col-md-12 pull-right">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Impuesto</th>
                            <th>Total</th>      
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td >
                              <div class="input-group">
                                <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                                <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>
                                <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                </div>
                              </div>
                            </td>
                            <td >
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><b>S/.</b></span>
                                </div>
                                <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>
                                <input type="hidden" name="totalVenta" id="totalVenta">
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <hr>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-cc-amazon-pay"></i></span>
                          </div>
                          <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                            <option value="">Seleccione método de pago</option>
                            <option value="Efectivo">Efectivo</option>
                            <option value="TC">Tarjeta Crédito</option>
                            <option value="TD">Tarjeta Débito</option>
                          </select>
                        </div>
                      </div>
                      <div class="cajasMetodoPago col-md-6"></div>
                      <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">    
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success float-right">Guardar venta</button>
                </div>
              </form>
              <?php
                $guardarVenta = new ControladorVentas();
                $guardarVenta -> ctrCrearVenta();
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header text-center text-light" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 );">
          <h5 class="text-center"><b>Editar cliente</b></h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-user-tie"></i></span>
            </div>
            <input type="text" class="form-control" name="nuevoCliente" placeholder="Ingresar nombre" required>
          </div>
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-id-card"></i></span>
            </div>
            <input type="number" min="0" class="form-control" name="nuevoDocumentoId" placeholder="Ingresar documento" required>
          </div>
          
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span> 
              </div>
              <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>
            </div>

            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone"></i></span>
              </div>
              <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'999-999-999'" data-mask required>
            </div>

            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span> 
              </div>
              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>
            </div>

            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span> 
              </div>
              <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Guardar cliente</button>
        </div>

      </form>

      <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>

    </div>

  </div>

</div>
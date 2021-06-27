  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear nuevo Cliente</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Ingresar nuevo cliente</li>
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
                <button class="btn btn-info float-right" data-toggle="modal" 
                data-target="#modalAgregarCliente">Nuevo cliente</button>
              </div>
            </div>
          </div>
          
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped dt-responsive tablas" width="100%">
              <thead>
                <tr>
                  <th style="width:10px">#</th>
                  <th>Nombre</th>
                  <th>Documento ID</th>
                  <th>Email</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Fecha nacimiento</th> 
                  <th>Total compras</th>
                  <th>Última compra</th>
                  <th>Ingreso al sistema</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $item = null;
                $valor = null;
                $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
                foreach ($clientes as $key => $value) {
                  echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["documento"].'</td>
                        <td>'.$value["email"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["direccion"].'</td>
                        <td>'.$value["fecha_nacimiento"].'</td>             
                        <td>'.$value["compras"].'</td>
                        <td>'.$value["ultima_compra"].'</td>
                        <td>'.$value["fecha"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fas fa-edit"></i></button>';
                          if($_SESSION["perfil"] == "Administrador"){                        
                              echo '<button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fa fa-times"></i></button>';
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

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->
<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog"> 
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header text-center text-light" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 );">
          <h5 class="text-center"><b>Ingresar nuevo cliente</b></h5>
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
            <input type="text" class="form-control" name="editarCliente" id="editarCliente" required>
            <input type="hidden" id="idCliente" name="idCliente">
          </div>
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-id-card"></i></span>
            </div>
            <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>
          </div>
          
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span> 
              </div>
              <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone"></i></span>
              </div>
              <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'999 999-999'" data-mask required>
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span> 
              </div>
              <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span> 
              </div>
              <input type="text" class="form-control input-lg" name="editarFechaNacimiento" id="editarFechaNacimiento"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Guardar cliente</button>
        </div>

      </form>

      <?php

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

      ?>

    </div>

  </div>

</div>


<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>
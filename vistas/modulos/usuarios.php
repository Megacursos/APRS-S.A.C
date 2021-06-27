<?php

if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar de usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar de usuarios</li>
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
              <div class="col-12">
                <button type="button" class="btn btn-info float-right" data-toggle="modal" 
                  data-target="#modalAgregarUsuario" title="Agregar nuevo usuario">Nuevo usuario</button>
              </div>
            </div>
          </div>

          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped dt-responsive text-center" width="100%">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Foto</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Última conexión</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $item = null;
                $valor = null;
                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                foreach ($usuarios as $key => $value){
                  
                  echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>';
                        if($value["foto"] != ""){
                          echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                        }else{
                          echo '<td><img src="vistas/img/usuarios/default/user-md.png" class="img-thumbnail" width="40px"></td>';
                        }
                        
                        echo '<td>'.$value["perfil"].'</td>';
                        if($value["estado"] != 0){
                          echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                        }else{
                          echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                        }
                        
                        echo '<td>'.$value["ultimo_login"].'</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>
                            </div>  
                          </td>
                    </tr>';
                  }


                  ?>
                  </tbody>
                </table>
             </div>
          </div>
      </div>
  </section>
</div>

  <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header text-center text-light" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 ); ">
          <h5 class="text-center"><b>Ingresar datos de nuevo usuario</b></h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-user "></i></span>
            </div>
            <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingrese nombre" required>
          </div>

          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-key "></i></span>
            </div>
            <input type="text" class="form-control" id="nuevoUsuario" name="nuevoUsuario" placeholder="Ingrese usuario" required>
          </div>

          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-lock "></i></span>
            </div>
            <input type="password" class="form-control" name="nuevoPassword" placeholder="Ingrese contraseña" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-users "></i></span>
            </div>
            <select class="form-control custom-select" name="nuevoPerfil">
              <option selected disabled>Seleccione perfil</option>
              <option value="Administrador">Administrador</option>
              <option value="Vendedor">Vendedor</option>
              <option value="Contador">Contador</option>
            </select>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-camera "></i></span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input nuevaFoto" name="nuevaFoto">
              <label class="custom-file-label" for="exampleInputFile">Subir foto de peso máximo: 2mb</label>
            </div>
          </div>
          <div class="col-md-6">
            <img class="img-thumbnail previsualizar" src="vistas/img/usuarios/default/user-md.png" width="100px">
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Guardar</button>
        </div> 

          <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>
      </form>
      </div>
    </div>
  </div>

  <!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header text-center text-light" style="background: linear-gradient( 45deg, #343a40, #343a40, #F0F0F0, #343a40, #343a40 ); ">
          <h5 class="text-center"><b>Editar usuario</b></h5>
          <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-body">
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-user "></i></span>
            </div>
            <input type="text" class="form-control" id="editarNombre" name="editarNombre" placeholder="Ingrese nombre" value="" required>
          </div>

          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-key "></i></span>
            </div>
            <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" placeholder="Ingrese usuario" value="" required>
          </div>

          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-lock "></i></span>
            </div>
            <input type="password" class="form-control" name="editarPassword" placeholder="Ingrese contraseña" required>
            <input type="hidden" id="passwordActual" name="passwordActual">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-users "></i></span>
            </div>
            <select class="form-control custom-select" name="editarPerfil">
              <option value="" id="editarPerfil" selected disabled>Seleccione perfil</option>
              <option value="Administrador">Administrador</option>
              <option value="Vendedor">Vendedor</option>
              <option value="Contador">Contador</option>
            </select>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
              <i class="fas fa-camera "></i></span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input nuevaFoto" name="editarFoto">
              <label class="custom-file-label" for="exampleInputFile">Subir foto de peso máximo: 2mb</label>
            </div>
          </div>
          <div class="col-md-6">
            <img class="img-thumbnail previsualizar" src="vistas/img/usuarios/default/user-md.png" width="100px">
            <input type="hidden" name="fotoActual" id="fotoActual">
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
          <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Modificar usuario</button>
        </div> 
      </form>
      <?php
          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();
        ?>
      </div>
    </div>
  </div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 
  <!-- Content Wrapper. Contains page content -->
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
                  <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modalAgregarUsuario" title="Agregar nuevo usuario">Nuevo usuario</button>
                </div>
              </div>
            </div>
            <div class="card-body text-center">
                <table id="example1" class="table table-bordered table-striped">
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
                  <tr>
                    <td>1</td>
                    <td>Vendedor</td>
                    <td>Vendedor</td>
                    <td><img class="rounded img-thumbnail" src="views/img/usuarios/default/user-md.png" width="50px"></td>
                    <td>Vendedor</td>
                    <td><button type="button" class="btn btn-danger btn-xs"><b>Desactivo</b></button></td>
                    <td>00:00</td>
                    <td><div class="btn-group" role="group" aria-label="button group">
                      <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Administrador</td>
                    <td>Administrador</td>
                    <td><img class="rounded img-thumbnail" src="views/img/usuarios/default/user-md.png" width="50px"></td>
                    <td>Administrador</td>
                    <td><button type="button" class="btn btn-success btn-xs"><b>Activo</b></button></td>
                    <td>00.05</td>
                    <td><div class="btn-group" role="group" aria-label="button group">
                      <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Contador</td>
                    <td>Contador</td>
                    <td><img class="rounded img-thumbnail" src="views/img/usuarios/default/user-md.png" width="50px"></td>
                    <td>Contador</td>
                    <td><button type="button" class="btn btn-success btn-xs"><b>Activo</b></button></td>
                    <td>00.05</td>
                    <td><div class="btn-group" role="group" aria-label="button group">
                      <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header text-center bg-gray-dark">
          <h5 class="text-center" id="modalAgregarUsuario"><b>Ingresar datos de nuevo usuario</b></h5>
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
            <input type="text" class="form-control" name="nuevoUsuario" placeholder="Ingrese usuario" required>
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
            <select id="inputStatus" class="form-control custom-select" name="nuevoPerfil">
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
              <input type="file" class="custom-file-input" id="nuevaFoto" name="nuevaFoto">
              <label class="custom-file-label" for="exampleInputFile">Subir foto</label>
            </div>
          </div>
          <p>Peso máximo de foto: 200mb</p>
            <img class="img-thumbnail" src="views/img/usuarios/default/user-md.png" width="100px">
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off mr-2"></i>Cancelar</button>
            <button type="submit" class="btn btn-info"><i class="fas fa-save mr-2"></i>Guardar</button>
          </div>
      </form>
      </div>
    </div>
  </div>

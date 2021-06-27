<div id="fondo"></div>

<div class="login-box" id="formulario">
  <div class="card card-outline" style=" background: rgba(0,0,0,0.6);border-radius: 10px;border: 1px solid white;">
  <img src="vistas/img/plantilla/logo2.png" class="img-responsive" 
            style="padding:20px 10px 0px 10px; height: 200px;">
    <div class="card-header text-center">
      <h3 class="text-success">Botica <b>San Roque</b></h3>
    </div>
    <!--<img src="vistas/img/plantilla/logo1.png" class="img-responsive" style="padding: 30px 100px 0px 100px">-->
    <div class="card-body">
      <p class="login-box-msg text-light"><b>Iniciar Sesión</b></p>

      <form method="post">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-md"></span>
            </div>
          </div>
          <input type="text" class="form-control" name="ingUsuario" placeholder="Ingrese su usuario" required>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" name="ingPassword" placeholder="Ingrese su contraseña" required>
        </div>

        <div class="social-auth-links text-center mt-2 mb-3">
        <button type="" class="btn btn-block btn-success">
          <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
        </button>
        <?php 
          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();
        ?>
      </form>
      <br>
      <p class="mb-1 text-center text-warning">
        <b>TODO LARGO CAMINO EMPIEZA DANDO UN PRIMER PASO</b>
      </p>
    </div>
  </div>
</div>
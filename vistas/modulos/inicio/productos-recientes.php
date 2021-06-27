<?php

$item = null;
$valor = null;
$orden = "id";

$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

 ?>


<div class="card bg-gradient-secundary">
  <div class="card-header border-2">
    <h3 class="card-title">
      <i class="fab fa-shopify"></i>
      Productos Agregados recientemente
    </h3>
<!--     <div class="card-tools">
    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
      <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
      <i class="fas fa-times"></i>
    </button>
  </div> -->
  </div>
  
  <div class="card-body">

    <ul class="products-list product-list-in-box">

    <?php

    for($i = 0; $i < 5; $i++){

      echo '<li class="item">
        <div class="row product-info">
              <div class="col-md-1">
                <img src="'.$productos[$i]["imagen"].'" class="img-fluid rounded-start" alt="Product Image">
              </div>
              <div class="col-md-11">
                <div class="card-body">
                  <h5 class="card-title">'.$productos[$i]["descripcion"].'</h5>
                  <span class="label text-success float-right">S/'.$productos[$i]["precio_venta"].'</span>
                </div>
              </div>
       </div>

      </li>';

    }

    ?>

    </ul>

  </div>

  <div class="card-footer text-center">

    <a href="productos" class="uppercase">Ver todos los productos</a>
  
  </div>

</div>

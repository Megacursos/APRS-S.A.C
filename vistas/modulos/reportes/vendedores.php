<?php

$item = null;
$valoe = null;

$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

$arrayVendedores = array();
$arraylistaVendedores = array();

foreach ($ventas as $key => $valueVentas) {

  foreach ($usuarios as $key => $valueUsuarios) {

    if($valueUsuarios["id"] == $valueVentas["id_vendedor"]){

        #Capturamos los vendedores en un array
        array_push($arrayVendedores, $valueUsuarios["nombre"]);
#ffc107e1#ff#ffc107e7
        #Capturamos las nombres y los valores netos en un mismo array
        $arraylistaVendedores = array($valueUsuarios["nombre"] => $valueVentas["neto"]);

         #Sumamos los netos de cada vendedor

        foreach ($arraylistaVendedores as $key => $value) {

            $sumaTotalVendedores[$key] += $value;

         }

    }
  
  }

}

#Evitamos repetir nombre
$noRepetirNombres = array_unique($arrayVendedores);

?>


<!--=====================================
VENDEDORES
======================================-->
<div class="card bg-gradient-light">
	<div class="card-header border-2">
    <h3 class="card-title">
      <i class="fas fa-chart-bar"></i>
      Vendedores
    </h3>
  </div>
  <div class="card-body">
  	<div class="box-body text-dark">
      <div class="chart-responsive">
        <div class="chart" id="bar-chart1" style="height: 300px;"></div>
		  </div>
  	</div>
  </div>
</div>

<script>
	
//BAR CHART
var bar = new Morris.Bar({
  element: 'bar-chart1',
  resize: true,
  data: [

  <?php
    
    foreach($noRepetirNombres as $value){

      echo "{y: '".$value."', a: '".$sumaTotalVendedores[$value]."'},";

    }

  ?>
  ],
  barColors: ['#ffc107'],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['ventas'],
  preUnits: 'S/',
  hideHover: 'auto'
});


</script>
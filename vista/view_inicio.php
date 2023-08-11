<?php
  session_start();
  include('templates/header1.php');    
  include('nav_bar.php');
  if(!isset($_SESSION['usuario'])){
      header('location:../index.php');
      die();
  }
  include_once('../modelo/modelo_mov.php');
  include_once('../modelo/modelo_servicios.php');
 $mov = New Movimientos();
  $matrizmov = $mov->get_movimientosvence();   
  
 $dash = new Servicios();
 $matrizservicio= $dash->get_dash();
 include('templates/sider.php');
  ?>



<div id="content">


<?php
        $tipo = $_SESSION['tipo'];
        if ( $tipo == 'ADMINISTRADOR') {
         ?>

  <div class="container-fluid">
  <?php foreach($matrizservicio as $registros){?>
    
        <div class="row">

        <div class="col-md-3.5">
          <div class="card text-white bg-info mb-3" style="max-width: 30rem;">
          <div class="card-header">CLIENTES</div>
          <div class="card-body">
          <div class="d-flex align-items-center">
              <img src="../assets/imagenes/clientes1.png" alt="Imagen" style="width: 100px; height: 100px; margin-right: 20px;" />
              <h1 class="ms-3">   <?=$registros["clientes"]?></h1>
          </div>
          </div>
          </div>
          </div>

          <div class="col-md-3.5">
          <div class="card text-white bg-success mb-3" style="max-width: 30rem;">
          <div class="card-header">INGRESOS</div>
          <div class="card-body">
          <div class="d-flex align-items-center">
              <img src="../assets/imagenes/flechaverde.png" alt="Imagen" style="width: 100px; height: 100px; margin-right: 20px;" />
              <h1 class="ms-3">    <?=$registros["ventas"]?></h1>
          </div>
          </div>
          </div>
          </div>


          <div class="col-md-3.5">
          <div class="card text-white bg-dark mb-3" style="max-width: 30rem;">
          <div class="card-header">GASTOS</div>
          <div class="card-body">
          <div class="d-flex align-items-center">
              <img src="../assets/imagenes/flecharoja.png" alt="Imagen" style="width: 100px; height: 100px; margin-right: 10px;" />
              <h1 class="ms-3">     <?=$registros["gastos"]?></h1>
          </div>
          </div>
          </div>
          </div>

          <div class="col-md-3.5">
          <div class="card text-white bg-primary mb-3" style="max-width: 30rem;">
          <div class="card-header">BALANCE</div>
          <div class="card-body">
          <div class="d-flex align-items-center">
              <img src="../assets/imagenes/balance1.png" alt="Imagen" style="width: 100px; height: 100px; margin-right: 10px;" />
              <h1 class="ms-4">   <?=$registros["balance"]?></h1>
          </div>
          </div>
          </div>
          </div>
      
    </div>
    <?php } 
        }else{?>
        <div class="container-fluid">
  <?php foreach($matrizservicio as $registros){?>
    
        <div class="row">

        <div class="col-md-10">
          <div class="card text-white bg-info mb-10" style="max-width: 30rem;">
          <div class="card-header">CLIENTES</div>
          <div class="card-body">
          <div class="d-flex align-items-center">
              <img src="../assets/imagenes/clientes1.png" alt="Imagen" style="width: 100px; height: 100px; margin-right: 20px;" />
              <h1 class="ms-3">   <?=$registros["clientes"]?></h1>
          </div>
          </div>
          </div>
          </div>

          
      
    </div>
    <?php }}?>
<!-- aqui termina -->
    <div class='row'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8' id='panel_mostrar'>
            <br>
            <tabla class="table table-striped table-bordered" style="width:300%">
                <thead>
                    <tr>
                        <td class='p-6' colspan='6'>
                            <p class='h3 text-center'>Movimientos Por Vencer Zomos VIP</p>
                        </td>
            
                    </tr>
                </thead>
                </table>
               
                </div>
                    <?php include 'view_modaladd.php'; ?>
                    
                </div>
                <table class='table mt-6' id='tmovi'>
                    <thead>
                        <tr>
                            <td class='p-2'>Id</td>
                            <td class='text-center p-2'>Cliente</td>
                            <td class='text-center p-2'>Fecha Vence</td>
                            <td class='p-2'>Servicio</td>
                            <td class='p-2'>Monto</td>
                            <td class='p-2'>Acciones</td>
                            
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($matrizmov as $registro){?>
                     <tr>
                      <td><?=$registro["id_venta"]?></td>
                      <td><?=$registro["cliente"]?></td>
                      <td><?=$registro["fecha_vence"]?></td>
                      <td><?=$registro["servicio"]?></td>
                      <td><?=$registro["monto"]?></td>
                     
                      <td> 
                     
                      <button type="button" name="borrar" class="btn btn-danger btn-xs borrar"  data-toggle="modal" data-whatever="@mdo">Cobrar</button>
                      
                     </tr>

                     <?php include 'view_modaleditventa.php'; ?>
                     <?php } ?>
                    </tbody>
                </table>
              
                </div>
            <div class='col-sm-2'></div>
         
        </div>
  </div>



</div>
</div>


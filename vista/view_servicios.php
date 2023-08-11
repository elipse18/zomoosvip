<?php
  session_start();
  include('templates/header1.php');    
  include('nav_bar.php');
  if(!isset($_SESSION['usuario'])){
      header('location:../index.php');
      die();
  }
  include('../modelo/modelo_servicios.php');
 $servicio = new Servicios();
 $matrizservicio= $servicio->get_servicios();
  ?>

<?php   include('templates/sider.php');?>
<div id="content">
<div class='container-fluid'>
    <div class='row'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8' id='panel_mostrar'>
            <br>
            <tabla class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td class='p-4' colspan='4'>
                            <p class='h3 text-center'>Servicios Zomos Vip</p>
                        </td>
            
                    </tr>
                </thead>
                </table>
               
                </div>
                  
                    <button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa-solid fa-plus"></i></button>
                </div>
                <table class='table mt-2' id='tmovi'>
                    <thead>
                        <tr>
                            <td class='p-2'>Id</td>
                            <td >Nombre</td>
                            <td class='p-2'>Costo</td>
                            <td class='p-2'>Precio</td>
                            <td class='p-2' >Acciones</td>
                      
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($matrizservicio as $registro){?>
                     <tr>
                      <td><?=$registro["id_servicio"]?></td>
                      <td><?=$registro["nombre"]?></td>
                      <td><?=$registro["costo"]?></td>
                      <td><?=$registro["precio"]?></td>
                      <td> 
                        <button type="button" name="editar"  class="btn btn-warning btn-xs editar" data-toggle="modal" data-target="#edit<?php echo $registro['id_servicio'];?>" data-whatever="@mdo">Editar</button>
                      <button type="button" name="borrar" class="btn btn-danger btn-xs borrar"  data-toggle="modal" data-target="#delete<?php echo $registro['id_servicio'];?>" data-whatever="@mdo">Borrar</button></td>
                  
                    
                     </tr>
                     <?php include 'view_modalservicio.php'; ?>
                     <?php } ?>
                    </tbody>
                </table>
             
        </div>
        <div class='col-sm-2'></div>
    </div>
</div>
</div>


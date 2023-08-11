<?php
  session_start();
  include('templates/header1.php');    
  include('nav_bar.php');
  if(!isset($_SESSION['usuario'])){
      header('location:../index.php');
      die();
  }
  include_once('../modelo/modelo_mov.php');
 $mov = New Movimientos();
  $matrizmov = $mov->get_movimientos();   
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
                            <p class='h3 text-center'>Movimientos Zomos VIP</p>
                        </td>
            
                    </tr>
                </thead>
                </table>
               
                </div>
                    <?php include 'view_modaladd.php'; ?>
                    <button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa-solid fa-plus"></i></button>
                </div>
                <table class='table mt-2' id='tmovi'>
                    <thead>
                        <tr>
                            <td class='p-2'>Id</td>
                            <td class='text-center p-2'>Fecha Inicio</td>
                            <td class='text-center p-2'>Fecha Vence</td>
                            <td class='p-2'>Cuenta</td>
                            <td class='p-2'>Cliente</td>
                            <td class='p-2'>Perfil</td>
                            <td class='p-2'>Codigo</td>
                            <td class='p-2'>Descripcion</td>
                            <td class='text-center p-2'>Monto</td>
                            <td class='text-center p-4'>Acciones</td>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($matrizmov as $registro){?>
                     <tr>
                      <td><?=$registro["id_venta"]?></td>
                      <td><?=$registro["fecha_inicio"]?></td>
                      <td><?=$registro["fecha_vence"]?></td>
                      <td><?=$registro["id_cuenta"]?></td>
                      <td><?=$registro["id_cliente"]?></td>
                      <td><?=$registro["nombre"]?></td>
                      <td><?=$registro["pin"]?></td>
                      <td><?=$registro["descripcion"]?></td>
                      <td><?=$registro["monto"]?></td>
                      <td> 
                     
                      <button type="button" name="borrar" class="btn btn-danger btn-xs borrar"  data-toggle="modal" data-target="#delete<?php echo $registro['id_venta'];?>" data-whatever="@mdo">Borrar</button>
                      <?php if (!empty($registro["nombre"])){
                        ?>
                          <button  disabled type="button" name="asignar" class="btn btn-secondary btn-xs success"  data-toggle="modal" data-target="#asignar<?php echo $registro['id_venta'];?>" data-whatever="@mdo" >Asignar Perfil</button></td>
                     <?php }else{ ?>
                        <button type="button" name="asignar" class="btn btn-success btn-xs success"  data-toggle="modal" data-target="#asignar<?php echo $registro['id_venta'];?>" data-whatever="@mdo">Asignar Perfil</button></td>
                        <?php } ?>
                     
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


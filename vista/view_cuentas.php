<?php
  session_start();
  include('templates/header1.php');    
  include('nav_bar.php');
  if(!isset($_SESSION['usuario'])){
      header('location:../index.php');
      die();
  }
  include('../modelo/modelo_cuentas.php');
 $cuentas = new Cuentas();
 $matrizcuenta= $cuentas->get_cuentas();
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
                            <p class='h3 text-center'>Cuentas Zomos Vip</p>
                        </td>
            
                    </tr>
                </thead>
                </table>
               
                </div>
                <?php include 'view_modalcuenta.php'; ?>
                    <button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa-solid fa-plus"></i></button>
                </div>
                <table class='table mt-2' id='tmovi'>
                    <thead>
                        <tr>
                            <td class='p-2'>Id</td>
                            <td >Servicio</td>
                            <td class='p-2'>Correo</td>
                            <td class='p-2'>Contraseña</td>
                            <td class='p-2'>Numero Perfil</td>
                            <td class='p-2'>Fecha Vence</td>
                            <td class='p-2' >Acciones</td>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($matrizcuenta as $registro){?>
                     <tr>
                      <td><?=$registro["id_cuenta"]?></td>
                      <td><?=$registro["servicio"]?></td>
                      <td><?=$registro["correo"]?></td>
                      <td><?=$registro["contrasena"]?></td>
                      <td><?=$registro["perfil"]?></td>
                      <td><?=$registro["fecha_vence"]?></td>
                      <td> 
                        <button type="button" name="editar"  class="btn btn-warning btn-xs editar" data-toggle="modal" data-target="#edit<?php echo $registro['id_cuenta'];?>" data-whatever="@mdo">Editar</button>
                      <button type="button" name="borrar" class="btn btn-danger btn-xs borrar"  data-toggle="modal" data-target="#delete<?php echo $registro['id_cuenta'];?>" data-whatever="@mdo">Borrar</button></td>
                    
                     </tr>

                     <?php include 'view_modaledit.php'; ?>
                     <?php } ?>
                     
              
                    </tbody>
                </table>
             
             
        </div>
        <div class='col-sm-2'></div>
    </div>
</div>
</div>
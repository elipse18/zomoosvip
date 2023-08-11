<?php
  session_start();
  include('templates/header1.php');    
  include('nav_bar.php');
  if(!isset($_SESSION['usuario'])){
      header('location:../index.php');
      die();
  }
  include('../modelo/modelo_clientes.php');
 $cliente = new Cliente();
 $matrizcliente= $cliente->get_clientes();
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
                            <p class='h3 text-center'>Clientes Zomos Vip</p>
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
                            <td class='text-center p-2'>Nombre</td>
                            <td class='p-2'>Apellido</td>
                            <td class='p-2'>Telefono</td>
                            <td class='p-2' >Acciones</td>
                      
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($matrizcliente as $registro){?>
                     <tr>
                      <td><?=$registro["id_cliente"]?></td>
                      <td><?=$registro["nombre"]?></td>
                      <td><?=$registro["apellido"]?></td>
                      <td><?=$registro["telefono"]?></td>
                      <td> 
                        <button type="button" name="editar"  class="btn btn-warning btn-xs editar" data-toggle="modal" data-target="#edit<?php echo $registro['id_cliente'];?>" data-whatever="@mdo">Editar</button>
                      <button type="button" name="borrar" class="btn btn-danger btn-xs borrar"  data-toggle="modal" data-target="#delete<?php echo $registro['id_cliente'];?>" data-whatever="@mdo">Borrar</button></td>
                    
                     </tr>

                     <?php include 'view_modalcliente.php'; ?>
                     <?php } ?>
                    </tbody>
                </table>
             
        </div>
        <div class='col-sm-2'></div>
    </div>
</div>
</div>


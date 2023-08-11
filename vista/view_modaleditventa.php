<div class="modal fade" id="asignar<?php echo $registro['id_venta'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/mov_controlador.php" method="post">
        
        <!-- <input type="hidden" class="form-control" name='id_venta'  value="" required> -->
        <label for="recipient-name" class="col-form-label">Cuenta</label>
        <input type="number" class="form-control" name="id_cuenta"  value="<?=$registro['id_cuenta']?>" >
        <label for="recipient-name" class="col-form-label">Fecha Vence</label>
        <input type="text" class="form-control" name='fecha_vence'  value="<?=$registro['fecha_vence']?>" required>
        <label for="recipient-name" class="col-form-label">Cliente</label>
        <input type="text" class="form-control" name='id_cliente'  value="<?=$registro['id_cliente']?>" required>
          
         

                <div class="col-lg-6">
                <label for="recipient-name" class="col-form-label">Perfil:</label>
                 <!-- <input type='number' class='form-control' id='nperfil' name='nperfil' required placeholder="Ingrese Numero Perfiles">  -->
                <input type='text' class='form-control' id='perfilname' name='perfilname' required placeholder="Ingrese Nombre Perfil">
                <input type='text' class='form-control' id='pin' name='pin' required placeholder="Ingrese Codigo Perfil">
            </div>
                    
         
          
          
  
      </div>
      <div class="modal-footer">
      <input type="hidden" name="accion" value="asignar_perfil">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>AGREGAR</button>
        
        
      </div>
      </form>
    </div>
  </div>
</div>




<div class="modal fade" id="delete<?php echo $registro['id_venta'];?>"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/mov_controlador.php" method="post">
        <div class="form-group">
          <div>
            Seguro que quiere eliminar registro <?= $registro['id_cuenta']; ?> ?
          </div>
          <input type="hidden" class="form-control" name='id_venta'  value="<?=$registro['id_venta']?>" required>
          <input type="hidden" class="form-control" name='id_cuenta'  value="<?=$registro['id_cuenta']?>" required>
          <input type="hidden" class="form-control" name='nperfil'  value="<?=$registro['nperfil']?>" required>
  </div>
         
      <div class="modal-footer">
      <input type="hidden" name="accion" value="eliminar_venta">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Eliminar</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>

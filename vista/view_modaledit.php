<div class="modal fade" id="edit<?php echo $registro['id_cuenta'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/cuentas_controlador.php"  method="post">
        <div class="form-group">
    <label for="id">ID:</label>
    <input type="text" class="form-control" placeholder="<?=$registro['id_cuenta']?>" value="<?=$registro['id_cuenta']?>" name="id_cuenta" readonly>
  </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Correo</label>
            <input type="text" class="form-control"  value="<?=$registro['correo']?>" id="correo" name="correo" required>
          </div>
          <div class="form-group">
        
            <label for="message-text" class="col-form-label">Contraseña</label>
            <input type="text" class="form-control"  value="<?=$registro['contrasena']?>" id="contrasena" name="contrasena" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha Vencimiento</label>
            <input type="date" class="form-control"  value="<?=$registro['fecha_vence']?>" id="fecha_vence" name="fecha_vence" required>
          </div>
  
      </div>
      <div class="modal-footer">
      <input type="hidden" name="accion" value="actualizar_cuenta">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Actualizar</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>



<div class="modal fade" id="delete<?php echo $registro['id_cuenta'];?>"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/cuentas_controlador.php"  method="post">
        <div class="form-group">
          <div>
            Seguro que quiere eliminar registro <?= $registro['correo']?> ?
          </div>
          <input type="hidden" class="form-control" name='id_cuenta'  value="<?=$registro['id_cuenta']?>" required>
    
  </div>
         
      <div class="modal-footer">
      <input type="hidden" name="accion" value="eliminar_cuenta">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Eliminar</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>






<div class="modal fade" id="edit<?php echo $registro['id_servicio'];?>"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/edit_ser_controlador.php" method="post">
        <div class="form-group">
    <label for="id">ID:</label>
    <input type="text" class="form-control" placeholder="<?=$registro['id_servicio']?>" value="<?=$registro['id_servicio']?>" name="id_servicio" readonly>
  </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input type="text" class="form-control"  value="<?=$registro['nombre']?>" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
        
            <label for="message-text" class="col-form-label">Costo</label>
            <input type="text" class="form-control"  value="<?=$registro['costo']?>" id="costo" name="costo" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Precio</label>
            <input type="text" class="form-control"  value="<?=$registro['precio']?>" id="precio" name="precio" required>
          </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>AGREGAR</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>


<div class="modal fade" id="delete<?php echo $registro['id_servicio'];?>"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/delete_ser_controlador.php" method="post">
        <div class="form-group">
          <div>
            Seguro que quiere eliminar registro <?= $registro['nombre']?> ?
          </div>
          <input type="hidden" class="form-control" name='id_servicio'  value="<?=$registro['id_servicio']?>" required>
    
  </div>
         
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Eliminar</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
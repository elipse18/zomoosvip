


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/clientes_controlador.php" method="post">
       
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
          </div>
  
      </div>
      <div class="modal-footer">
      <input type="hidden" name="accion" value="insertar_cliente">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>AGREGAR</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>


<div class="modal fade" id="edit<?php echo $registro['id_cliente'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/clientes_controlador.php" method="post">
        <div class="form-group">
    <label for="id">ID:</label>
    <input type="text" class="form-control" placeholder="<?=$registro['id_cliente']?>" value="<?=$registro['id_cliente']?>" name="id_cliente" readonly>
  </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre</label>
            <input type="text" class="form-control"  value="<?=$registro['nombre']?>" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
        
            <label for="message-text" class="col-form-label">Costo</label>
            <input type="text" class="form-control"  value="<?=$registro['apellido']?>" id="apellido" name="apellido" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Precio</label>
            <input type="text" class="form-control"  value="<?=$registro['telefono']?>" id="telefono" name="telefono" required>
          </div>
  
      </div>
      <div class="modal-footer">
      <input type="hidden" name="accion" value="actualizar_cliente">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>ACTUALIZAR</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>

<div class="modal fade" id="delete<?php echo $registro['id_cliente'];?>"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/clientes_controlador.php" method="post">
        <div class="form-group">
          <div>
            Seguro que quiere eliminar registro <?= $registro['nombre']?> ?
          </div>
          <input type="hidden" class="form-control" name='id_cliente'  value="<?=$registro['id_cliente']?>" required>
    
  </div>
         
      <div class="modal-footer">
      <input type="hidden" name="accion" value="eliminar_cliente">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Eliminar</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>
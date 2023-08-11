
<?php

  
  
  include_once('../modelo/modelo_servicios.php');
 $servicios = new Servicios();
 $matrizservicio= $servicios->consulta_servicios();
  ?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registar Cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/cuentas_controlador.php" method="post">
       
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">SERVICIO</label>
           <select class='form-control' id='id_servicio'  name='id_servicio' required>
            <option value=''>Seleccione</option>
            <?php
      
      foreach ($matrizservicio as $registro) {?> 
      <option value='<?= $registro['id_servicio']?>'><?= $registro['nombre']; }?></option>
 
        
      
        </select> 
     
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">CORREO</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">CONTRASEÑA</label>
            <input type="text" class="form-control" id="contrasena" name="contrasena" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Numero Perfil</label>
            <input type="text" class="form-control" id="perfil" name="perfil" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha:</label>
            <input type="date" class="form-control" id="fecha_vence" name="fecha_vence" required>
          </div>
      </div>
      <div class="modal-footer">
      <input type="hidden" name="accion" value="insertar_cuenta">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>AGREGAR</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>





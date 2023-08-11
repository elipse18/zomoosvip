<?php

  
  
  include_once('../modelo/modelo_clientes.php');
  
  include_once('../modelo/modelo_servicios.php');
 $cliente = new Cliente();
 $matrizcliente= $cliente->get_clientesnom();

 $servicio = new Servicios();

 $matrizservicio= $servicio->get_servicios();

  ?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controlador/mov_controlador.php" method="post">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha Inicio:</label>
            <input type="date" class="form-control" id="fechai" name="fechai" value="<?php echo date('Y-m-d'); ?>"  required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha Corte:</label>
            <input type="date" class="form-control" id="fechav" name="fechav" required>
          </div>
          <div class="form-group">  
          <label for="recipient-name" class="col-form-label">Cliente:</label>
        <select type='text' class='form-control' id='cliente'  name='cliente' required>>
    <option value=''>Seleccionar</option>
        <?php
    
        foreach ($matrizcliente as $registro) {
          
          echo "<option value='" . $registro['id_cliente'] . "'>" . $registro['nombre'] . "</option>";
        }
        ?>
        </select>
           
           
          </div>
          <div class="row">
          <div class="col-lg-4">  
          <label for="recipient-name" class="col-form-label">Servicio:</label>
          <select class="js-example-basic-single" name="sel_servicio" id="sel_servicio" style="width:100%"  required>
          <option value=''>Seleccionar</option>
          <?php
    
        foreach ($matrizservicio as $registro) {
          
          echo "<option value='" . $registro['id_servicio'] . "'>" . $registro['nombre'] . "</option>";
        }
        ?>
        </select>
           
          </div>
          
          <div class="col-lg-6">  
          <label for="recipient-name" class="col-form-label">Cuenta:</label>
        <select type='text' class='js-example-basic-single' id='sel_cuenta'  name='sel_cuenta'  style="width:100%" required>
        <option value=''>Seleccionar</option>
       
       
        </select>
           
           
          </div>

           <div class="col-lg-6">
     <label for="recipient-name" class="col-form-label">Perfil:</label>
     <input type='text' class='form-control' id='nperfil' name='nperfil' required placeholder="Ingrese Numero Perfiles"   value="1"  >
    <!-- <input type='text' class='form-control' id='perfilname' name='perfilname' required placeholder="Ingrese Nombre Perfil">
     <input type='text' class='form-control' id='pin' name='pin' required placeholder="Ingreso Codigo Pefil">-->
   </div> 
          </div>
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descripcion:</label>
            <input type="text" class="form-control" id="descrip"  name="descrip" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Monto:</label>
            <input type="text" class="form-control"  id="monto" name="monto" required >
          </div>
  
      </div>
      <div class="modal-footer">
      <input type="hidden" name="accion" value="insertar_venta">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-sharp fa-solid fa-xmark"></i>CERRAR</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>AGREGAR</button>
        
        
      </div>
      </form>

      <?php
              
              if (isset($_GET['error'])){
                  $error = $_GET['error'];
                  if($error){?>
                      <div class="alert alert-danger">
                          <strong>! Error !</strong> .
                      </div>
                      <?php } ?>
                      <?php } ?>
    </div>
  </div>
</div>




<script>
  $(document).ready(function(e){
    $("#sel_servicio").change(function(){
          var parametros = "id="+$("#sel_servicio").val();
        //  alert(parametros);
            $.ajax({
          data: parametros,
        url: '../controlador/traer_cuenta.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            // Obtener el select en HTML
            //console.log(response) 
            var select = $('#sel_cuenta');
          
            // Vaciar el select
            select.empty();
            
            // Generar las opciones del select con los datos recibidos
            $.each(response, function(index, option) {
                select.append($('<option></option>').attr('value', option.id_cuenta).text(option.correo));
                //console.log(select);
            });
            }
        });


		var recibe =  $('#sel_servicio').val();
    var numero= $('#nperfil').val();
		$.ajax({
			url: '../controlador/trae_servicio.php',
			dataType: 'json',
			type: 'POST',
			data: {'recibe': recibe},
			success: function(data){
				$('#monto').val(data);
            $('#nperfil').on('keyup', function() {
      // Código para manejar el evento onchange del campo "nperfil"
      var nperfil = $(this).val();
      var total = data*nperfil;

      total = total.toFixed(2);
      $('#monto').val(total);
        
    });
			
				
			}
		});
		
	

    })
  })

  var fechaActual = new Date();
  fechaActual.setMonth(fechaActual.getMonth() + 1);
  var fechaFormateada = fechaActual.toISOString().split("T")[0];
  document.getElementById("fechav").value = fechaFormateada;
 
</script>
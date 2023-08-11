<?php
    
    session_start();
    // borrar todas las variables de sesion
    session_unset();
        
    // destruir sesion
    session_destroy();
    include('templates/header.php');  
?>

<div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="assets/imagenes/avatar.png">
                </div>
                <form class="col-12"  action="controlador/ingreso_controlador.php"  method='post'>
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
              
                        <input type="password" class="form-control" placeholder="Contrasena" name="clave"/>
                    </div>
               <input type='submit' name='submit' value='Ingresar' class='btn btn-primary'> 
               <span id="icon">
                 <i class="fas fa-sign-in-alt"></i>
                  </span>
         
                   
                </form>
                <?php
              
              if (isset($_GET['error'])){
                  $error = $_GET['error'];
                  if($error){?>
                      <div class="alert alert-danger">
                          <strong>! Error !</strong> Nombre de usuario o clave incorrectos.
                      </div>
                      <?php } ?>
                      <?php } ?>
              
            </div>
        </div>
    </div>
   
    <?php    
    include('templates/footer.php');
    ?>
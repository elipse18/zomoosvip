

<?php
require_once '../modelo/modelo_cuentas.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el formulario
    
    $id= $_POST['id_cuenta'];
    $id_servicio= $_POST['id_servicio'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $fecha_vence = $_POST['fecha_vence'];
    $nperfil = $_POST['perfil'];


    $cuenta = new Cuentas();

  
   
    if ($_POST['accion'] == 'insertar_cuenta') {
        $exito = $cuenta->insertar_cuenta($id_servicio,$correo, $contrasena,$nperfil, $fecha_vence);

    }  
    if ($_POST['accion'] == 'actualizar_cuenta') {
        $exito = $cuenta->editar_cuenta($id,$correo, $contrasena, $fecha_vence);
    }
    if ($_POST['accion'] == 'eliminar_cuenta') {
        $exito = $cuenta->eliminar_cuenta($id);
     }

    
    
   
    

    if ($exito['exito']) {
        header("Location: ../vista/view_cuentas.php");
    } else {
        header('location: ../vista/view_cuentas.php?error=true');
    }
}
?>
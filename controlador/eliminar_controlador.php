<?php
require_once '../modelo/modelo_servicios.php';

    // Obtener los datos enviados por el formulario
  
    $id = test_input($_REQUEST['id']);

    
    // Crear una instancia de la clase Cliente
    $servicio = new Servicios();

    // Insertar los datos en la base de datos utilizando el método insertar_cliente() de la clase Cliente
    $exito = $servicio->eliminar_servicio($id);

    if ($exito['exito']) {
        header("Location: ../vista/view_servicios.php");
    } else {
        header('location: ../vista/view_servicios.php?error=true');
    }

?>
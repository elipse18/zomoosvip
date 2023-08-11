<?php
require_once '../modelo/modelo_servicios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el formulario
    $id =  $_POST['id_servicio'];
    
 
    // Crear una instancia de la clase Cliente
    $servicio = new Servicios();

    // Insertar los datos en la base de datos utilizando el método insertar_cliente() de la clase Cliente
    $exito = $servicio->eliminar_servicio($id);

    if ($exito['exito']) {
        header("Location: ../vista/view_servicios.php");
    } else {
        header('location: ../vista/view_servicios.php?error=true');
    }
}
?>
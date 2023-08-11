<?php
require_once '../modelo/modelo_servicios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el formulario
    $id =  $_POST['id_servicio'];
    $nombre = $_POST['nombre'];
    $costo = $_POST['costo'];
    $precio = $_POST['precio'];
 
    // Crear una instancia de la clase Cliente
    $servicio = new Servicios();

    // Insertar los datos en la base de datos utilizando el método insertar_cliente() de la clase Cliente
    $exito = $servicio->editar_servicio($id,$nombre, $costo, $precio);

    if ($exito['exito']) {
        header("Location: ../vista/view_servicios.php");
    } else {
        header('location: ../vista/view_servicios.php?error=true');
    }
}
?>
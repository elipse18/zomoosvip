<?php
require_once '../modelo/modelo_clientes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados por el formulario
    $id = $_POST['id_cliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];

    // Crear una instancia de la clase Cliente
    $cliente = new Cliente();

    // Insertar los datos en la base de datos utilizando el método insertar_cliente() de la clase Cliente
    
   


    if ($_POST['accion'] == 'insertar_cliente') {
        $exito = $cliente->insertar_cliente($nombre, $apellido, $telefono);

    }  
    if ($_POST['accion'] == 'actualizar_cliente') {
       $exito = $cliente->editar_cliente($id,$nombre, $apellido, $telefono);
    }
    if ($_POST['accion'] == 'eliminar_cliente') {
        $exito = $cliente->eliminar_cliente($id);
     }


    if ($exito['exito']) {
        header("Location: ../vista/view_clientes.php");
    } else {
        header('location: ../vista/view_clientes.php?error=true');
    }
}
?>
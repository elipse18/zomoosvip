
<?php
require_once '../modelo/modelo_mov.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos enviados por el formulario
        $id= $_POST['id_venta'];
        $fechai = $_POST['fechai'];
        $fechav = $_POST['fechav'];
        $cliente = $_POST['cliente'];
        $servicio = $_POST['sel_servicio'];
        $cuenta = $_POST['sel_cuenta'];
        $descripcion = $_POST['descrip'];
        $monto = $_POST['monto'];
      
        $fecha_vence = $_POST['fecha_vence'];
        $nperfil = $_POST['nperfil'];
        $perfilname = $_POST['perfilname'];
        $pin = $_POST['pin'];
        $id_cuenta= $_POST['id_cuenta'];
        $id_cliente= $_POST['id_cliente'];

        $venta = new Movimientos();
       

        if ($_POST['accion'] == 'insertar_venta') {

         $exito = $venta->insertar_venta($servicio,$cuenta,$cliente,$descripcion,$fechai, $fechav,$monto,$nperfil);
    
        }  
     

         if ($_POST['accion'] == 'asignar_perfil') {
          
            $exito = $venta->insertar_perfil($id_cuenta,$fecha_vence,$id_cliente,$perfilname,$pin);
          
         }

         if ($_POST['accion'] == 'eliminar_venta') {
          
            $exito = $venta->actualizar_perfil2($id,$nperfil,$id_cuenta);
         }


        if ($exito['exito']) {
            header("Location: ../vista/view_movimientos.php");
        } else {
            header('location: ../vista/view_movimientos.php?error=true');
        }
    }


?>

<?php

require_once '../modelo/modelo_servicios.php';



    // Obtener los datos enviados por el formulario
 
    $recibe = $_POST['recibe'];

    $servicio = new Servicios();

    $exito= $servicio->get_monto($recibe);


  


?>

<?php
require_once '../modelo/modelo_cuentas.php';


    // Obtener los datos enviados por el formulario
 
    $id = $_POST['id'];

    $cuenta = new Cuentas();

        $exito = $cuenta->buscar("cuenta", "id_servicio=" . $id);
            $html = array();

            foreach ($exito as $value) {
                $html[] = array(
                    "id_cuenta" => $value['id_cuenta'],
                    "correo" => $value['correo']
                );
            }

die(json_encode($html));

  


?>
<?php


class Servicios {
    
    private $nombre;
    private $costo;
    private $precio;
    private $id;

   
    public function __construct(){
        require_once("../modelo/conectar.php");
        $this->conexion = Conectar::conexion();
    }
 

    public function insertar_servicio($nombre, $costo, $precio){
        $exito = array(
            'exito' => false
        );
        
        $sql = 'INSERT INTO servicios (nombre, costo,precio) VALUES (?,?,?)';
        $st  = $this->conexion->prepare($sql);
        $st->bindParam(1, $nombre);
        $st->bindParam(2, $costo);
        $st->bindParam(3, $precio);
        
        if($st->execute()){
            $exito['exito'] = true;
        }

        $st = NULL;
        $this->conexion = NULL;

        return $exito;
    }
    
    public function get_servicios(){
        $sql = 'SELECT id_servicio, nombre,costo,precio from servicios ';
        $st = $this->conexion->prepare($sql);
        $st->execute();
        $cliente = $st->fetchAll();           
        $st = NULL;
        $conexion = NULL;
        return $cliente;
    }  

    


    function get_servicio($id){
        $sql = 'SELECT id_servicio,nombre, costo, precio FROM servicios WHERE id= ? ';
        $st  = $this->conexion->prepare($sql);
        $st->bindParam(1, $id);
        $st->execute();
        $servicio = $st->fetch(PDO::FETCH_ASSOC);
        $st = NULL;
        $conexion = NULL;
        return $servicio;
    } 

    public function get_dash(){
        $sql = 'SELECT  (SELECT COUNT(b.id_cliente)
        FROM clientes AS b )  AS clientes ,
        SUM(a.monto) AS ventas,(SELECT SUM(total_gasto)
       FROM gastos ) AS gastos,  SUM(a.monto)-(SELECT SUM(total_gasto)
       FROM gastos ) AS balance
       
       FROM ventas AS a 
       left JOIN clientes AS b ON a.id_cliente=b.id_cliente
       LEFT JOIN gastos AS c ON a.id_servicio=c.id_servicio;';
        $st = $this->conexion->prepare($sql);
        $st->execute();
        $mov = $st->fetchAll();           
        $st = NULL;
        $this->conexion = NULL;
        return $mov;
    }  

    // function get_monto($id){
    //     $sql = 'SELECT precio FROM servicios WHERE id= ? ';
    //     $st  = $this->conexion->prepare($sql);
    //     $st->bindParam(1, $id);
    //     $st->execute();
    //     $servicio = $st->fetch(PDO::FETCH_ASSOC);
    //     $st = NULL;
    //     $conexion = NULL;
    //     return $servicio;
    // } 


    public function get_monto($recibe) {
        $sql = 'SELECT precio FROM servicios WHERE id_servicio = :id';
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $recibe);
        $stmt->execute();
        $servicio = $stmt->fetch(PDO::FETCH_ASSOC);
        echo  $servicio['precio'];
        
    }

    public function consulta_servicios(){
        $sql = 'SELECT id_servicio, nombre from servicios ';
        $st = $this->conexion->prepare($sql);
        $st->execute();
        $cliente = $st->fetchAll();           
        $st = NULL;
        $conexion = NULL;
        return $cliente;
    }  

    public function eliminar_servicio($id){
        $exito = false;
        $sql = 'DELETE FROM servicios  WHERE id_servicio = ?';
       $st  = $this->conexion->prepare($sql);
       $st->bindParam(1, $id);
      
       if($st->execute()){
           $exito = true;
       }
       $st = NULL;
       $conexion = NULL;           
      return $exito;
   
    }  

    function editar_servicio($id, $nombre, $costo, $precio){
        $exito = false;
         $sql = 'UPDATE servicios set nombre = ?, costo = ? , precio = ?  WHERE id_servicio = ?';
        $st  = $this->conexion->prepare($sql);
        $st->bindParam(1, $nombre);
        $st->bindParam(2, $costo);
        $st->bindParam(3, $precio);
        $st->bindParam(4, $id);
        

        if($st->execute()){
            $exito = true;
          } else {
            $exito = false;
          }
        $st = NULL;
        $conexion = NULL;           
       return $exito;
    }

}
?>
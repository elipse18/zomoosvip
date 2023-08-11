<?php


class Cliente {
    
    private $nombre;
    private $apellido;
    private $telefono;


   
    public function __construct(){
        require_once("../modelo/conectar.php");
        $this->conexion = Conectar::conexion();
    }
 

    public function insertar_cliente($nombre, $apellido, $telefono){
        $exito = array(
            'exito' => false
        );
        
        $sql = 'INSERT INTO clientes (nombre, apellido, telefono) VALUES (?,?,?)';
        $st  = $this->conexion->prepare($sql);
        $st->bindParam(1, $nombre);
        $st->bindParam(2, $apellido);
        $st->bindParam(3, $telefono);
        
        if($st->execute()){
            $exito['exito'] = true;
        }

        $st = NULL;
        $this->conexion = NULL;

        return $exito;
    }
    public function get_clientes(){
        $sql = 'SELECT id_cliente, nombre,apellido,telefono from clientes ';
        $st = $this->conexion->prepare($sql);
        $st->execute();
        $cliente = $st->fetchAll();           
        $st = NULL;
        $conexion = NULL;
        return $cliente;
    }  

    public function get_clientesnom(){
        $sql = 'SELECT id_cliente,nombre from clientes ';
        $st = $this->conexion->prepare($sql);
        $st->execute();
        $cliente = $st->fetchAll();           
        $st = NULL;
        $conexion = NULL;
        return $cliente;
    }  

    function editar_cliente($id, $nombre, $apellido, $telefono){
        $exito = false;
         $sql = 'UPDATE clientes set nombre = ?, apellido = ? , telefono = ?  WHERE id_cliente = ?';
        $st  = $this->conexion->prepare($sql);
        $st->bindParam(1, $nombre);
        $st->bindParam(2, $apellido);
        $st->bindParam(3, $telefono);
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

    public function eliminar_cliente($id){
        $exito = false;
        $sql = 'DELETE FROM clientes  WHERE id_cliente = ?';
       $st  = $this->conexion->prepare($sql);
       $st->bindParam(1, $id);
      
       if($st->execute()){
           $exito = true;
       }
       $st = NULL;
       $conexion = NULL;           
      return $exito;
   
    }  
}
?>
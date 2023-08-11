<?php


class Cuentas {

    private $id_servicio;
    private $correo;
    private $contrasena;
    private $fecha_vence;

    private $tabla;

    private $condicion;
    private $nperfil;
    
    public function __construct(){
        require_once("../modelo/conectar.php");
        $this->conexion = Conectar::conexion();
    }
 

    public function insertar_cuenta($id_servicio,$correo, $contrasena,$nperfil, $fecha_vence){
        $exito = array(
            'exito' => false
        );
        
        $sql = 'INSERT INTO cuenta (id_servicio,correo, contrasena,perfil, fecha_vence) VALUES (?,?,?,?,?)';
        $st  = $this->conexion->prepare($sql);
        $st->bindParam(1, $id_servicio);
        $st->bindParam(2, $correo);
        $st->bindParam(3, $contrasena);
        $st->bindParam(4, $nperfil);
        $st->bindParam(5, $fecha_vence);
     
         
        if($st->execute()){
            $exito['exito'] = true;
        }

        $st = NULL;
        $this->conexion = NULL;

        return $exito;
    }

   

    public function get_cuentas(){
        $sql = 'SELECT a.id_cuenta,a.id_servicio, a.correo,a.contrasena,a.perfil,a.fecha_vence,b.nombre AS servicio
        from cuenta AS a 
        JOIN servicios AS b ON  a.id_servicio=b.id_servicio';
        $st = $this->conexion->prepare($sql);
        $st->execute();
        $cliente = $st->fetchAll();           
        $st = NULL;
        $conexion = NULL;
        return $cliente;
    }  
    
    public function buscar($tabla, $condicion){
        $consulta = $this->conexion->prepare("SELECT id_cuenta,correo
        FROM $tabla WHERE $condicion AND perfil>0");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        

     
        if($resultado) {
            return $resultado;
        } else {
            return false;
        }
    }

    function editar_cuenta($id,$correo, $contrasena, $fecha_vence){
        $exito = false;
         $sql = 'UPDATE cuenta set correo = ?, contrasena = ? , fecha_vence = ?  WHERE id_cuenta = ?';
        $st  = $this->conexion->prepare($sql);
        $st->bindParam(1, $correo);
        $st->bindParam(2, $contrasena);
        $st->bindParam(3, $fecha_vence);
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

  

    public function eliminar_cuenta($id){
        $exito = false;
        $sql = 'DELETE FROM cuenta  WHERE id_cuenta = ?';
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
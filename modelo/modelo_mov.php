<?php
    class Movimientos{

       
        private $servicio;
        private $cuenta;
        private $cliente;
        private $descripcion;
        private $fechai;
        private $fechav;
        private $monto;
        private $perfilname;
        private $pin;
        private $id_cuenta;
        private $fecha_vence;
        private $nperfil;
        public function __construct(){
            require_once("../modelo/conectar.php");
            $this->conexion = Conectar::conexion();
        }


        
        public function insertar_venta($servicio,$cuenta,$cliente,$descripcion,$fechai, $fechav,$monto,$nperfil){

            
            $exito = array(
                'exito' => false
            );
            $sql = 'INSERT INTO ventas (id_servicio, id_cuenta, id_cliente,descripcion,fecha_inicio,fecha_vence,monto,nperfil) VALUES (?,?,?,?,?,?,?,?)';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $servicio);
            $st->bindParam(2, $cuenta);
            $st->bindParam(3, $cliente);
            $st->bindParam(4, $descripcion);
            $st->bindParam(5, $fechai);
            $st->bindParam(6, $fechav);
            $st->bindParam(7, $monto);
            $st->bindParam(8, $nperfil);
            if($st->execute()){
                $exito['exito'] = true;
                $this->actualizar_perfil($nperfil, $cuenta);
            }
    
            $st = NULL;
            $this->conexion = NULL;
    
            return $exito;
        }


        public function insertar_perfil($id_cuenta,$fecha_vence,$id_cliente,$perfilname,$pin){
            $exito = array(
                'exito' => false
            );
            $sql = 'INSERT INTO perfil (id_cuenta,id_cliente,nombre,pin,fecha_vence) VALUES (?,?,?,?,?)';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $id_cuenta);
            $st->bindParam(2, $id_cliente);
            $st->bindParam(3, $perfilname);
            $st->bindParam(4, $pin);
            $st->bindParam(5, $fecha_vence);
            
            if($st->execute()){
                $exito['exito'] = true;
                $this->update_venta($id_cliente);
            }
    
            $st = NULL;
            $this->conexion = NULL;
    
            return $exito;
        }

        public function update_venta($id_cliente){
            $exito = false;
            $sql = 'UPDATE ventas SET id_perfil = (SELECT id_perfil
            FROM perfil
            WHERE id_cliente = ?)
             WHERE id_cliente=?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $id_cliente);
            $st->bindParam(2, $id_cliente);
         
            
            if($st->execute()){
                $exito = true;
                
              } else {
                $exito = false;
              }
            $st = NULL;
            $conexion = NULL;           
           return $exito;
        }

        public function get_movimientos(){
            $sql = "SELECT id_venta,id_cuenta,fecha_vence, fecha_inicio,
            id_cliente,descripcion,monto,nperfil,'' AS nombre,'' AS pin
             from ventas
             WHERE id_perfil IS null
            UNION ALL 
            SELECT a.id_venta,a.id_cuenta,a.fecha_vence,
             a.fecha_inicio,a.id_cliente,a.descripcion
             ,a.monto ,a.nperfil, b.nombre, b.pin
             from ventas AS a 
             JOIN perfil AS b  on a.id_perfil=b.id_perfil";
            $st = $this->conexion->prepare($sql);
            $st->execute();
            $mov = $st->fetchAll();           
            $st = NULL;
            $this->conexion = NULL;
            return $mov;
        }  

        public function get_movimientosvence(){
            $sql = 'SELECT a.id_venta,a.id_servicio,a.id_cliente,a.fecha_vence,b.nombre AS servicio,c.nombre AS cliente, a.monto
            FROM ventas AS a 
            JOIN servicios AS b  ON a.id_servicio=b.id_servicio
            JOIN clientes AS c ON a.id_cliente=c.id_cliente
            WHERE fecha_vence BETWEEN DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY)
            AND DATE_ADD(DATE_SUB(CURDATE(), INTERVAL WEEKDAY(CURDATE()) DAY), INTERVAL 6 DAY);';
            $st = $this->conexion->prepare($sql);
            $st->execute();
            $mov = $st->fetchAll();           
            $st = NULL;
            $this->conexion = NULL;
            return $mov;
        }  

        public function get_dash(){
            $sql = 'SELECT COUNT(b.id_cliente) AS clientes,
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

        public function actualizar_perfil($nperfil,$cuenta){
            $exito = false;
            $sql = 'UPDATE cuenta SET perfil = perfil-?  WHERE id_cuenta = ?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $nperfil);
            $st->bindParam(2, $cuenta);
         
            
            if($st->execute()){
                $exito = true;
              } else {
                $exito = false;
              }
            $st = NULL;
            $conexion = NULL;           
           return $exito;
        }


        public function actualizar_perfil2($id,$nperfil,$id_cuenta){
            $exito = false;
            $sql = 'UPDATE cuenta SET perfil = perfil+? WHERE id_cuenta = ?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $nperfil);
            $st->bindParam(2, $id_cuenta);
         
            
            if($st->execute()){
                $exito = true;
                $this->eliminar_venta($id);
              } else {
                $exito = false;
              }
            $st = NULL;
            $conexion = NULL;           
           return $exito;
        }

        public function eliminar_venta($id){
            $exito = false;
            $sql = 'DELETE FROM ventas  WHERE id_venta = ?';
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
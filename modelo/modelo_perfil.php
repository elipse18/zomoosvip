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

        public function __construct(){
            require_once("../modelo/conectar.php");
            $this->conexion = Conectar::conexion();
        }


        
       

        public function insertar_perfil($id_cuenta,$perfilname,$pin,$fechav){
            $exito = array(
                'exito' => false
            );
            $sql = 'INSERT INTO perfil (id_cuenta,nombre,pin,fecha_vence) VALUES (?,?,?,?)';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $cuenta);
            $st->bindParam(2, $perfilname);
            $st->bindParam(3, $pin);
            $st->bindParam(4, $fechav);
            
            if($st->execute()){
                $exito['exito'] = true;
            }
    
            $st = NULL;
            $this->conexion = NULL;
    
            return $exito;
        }

        function actualizar_perfil($nperfil,$id_cuenta){
            $exito = false;
             $sql = 'UPDATE cuenta set perfil = perfil-?  WHERE id_cuenta = ?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $nperfil);
            $st->bindParam(2, $id_cuenta);
          
            
    
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
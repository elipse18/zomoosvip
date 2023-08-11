<?php
    class Usuario{

        private $conexion;
        private $usuario;

        public function __construct(){
            require_once("../modelo/conectar.php");
            $this->conexion = Conectar::conexion();
        }

        public function consultarUsuario($usuario, $clave){
            $sql = 'SELECT nombre, password, tipo FROM usuarios WHERE nombre = ? AND password = ?';
            $st = $this->conexion->prepare($sql);
            $st->bindParam(1, $usuario);
            $st->bindParam(2, $clave);
            $st->execute();
            $usuario = $st->fetch(PDO::FETCH_ASSOC);

            return $usuario;
        }
    }
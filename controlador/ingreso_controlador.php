<?php

    if(isset($_POST['submit'])){
        $nom_usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        require_once('../modelo/modelo_usuario.php');
        $ingreso = new Usuario();
        $usuario = $ingreso->consultarUsuario($nom_usuario, $clave);
        if(isset($usuario['nombre'])){            
            session_start();
            $_SESSION["usuario"] = $nom_usuario;
            $_SESSION['tipo'] = $usuario['tipo'];
            require_once('../vista/view_inicio.php');             
        }else{            
           header('location:../index.php?error=true');
        }
    }else{ 
        require_once('vista/view_login.php');
    }
  
    
<?php
    include "nusoap/lib/nusoap.php";
    include "modelos/ProductoModelo.php";
    include "modelos/UsuarioModelo.php";
    include "controladores/UsuarioControlador.php";
    include "controladores/ProductoControlador.php";

    function login($usuario){
        $usuarioControlador = new UsuarioControlador();
        return $usuarioControlador->login($usuario->username,$usuario->username);
    }

    
?>
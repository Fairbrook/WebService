<?php
    include "nusoap/lib/nusoap.php";
    include "modelos/ProductoModelo.php";
    include "modelos/UsuarioModelo.php";
    include "controladores/UsuarioControlador.php";
    include "controladores/ProductoControlador.php";

    function Ingresar($usuario){
        $usuarioControlador = new UsuarioControlador();
        return $usuarioControlador->login($usuario->username,$usuario->username);
    }

    function RegistrarCuenta($usuario){
        $usuarioControlador = new UsuarioControlador();
        $check = $usuarioControlador->GetById($usuario->username);
        if($check==null){
            $usuarioControlador->Insert($usuario->username,$usuario->password);
            return 1;
        }else return 3;
    }

?>
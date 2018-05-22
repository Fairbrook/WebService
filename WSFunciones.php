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

    function SetHash($usuario){
        $usuarioControlador = new UsuarioControlador();
        $usuarioControlador->SetHash($usuario->username,$usuario->hash);
    }

    function CheckHash($usuario){
        $usuarioControlador = new UsuarioControlador();
        $bool = $usuarioControlador->Check($usuario->hash);
        if($bool)return 1;
        else return 0;
    }

    function AgregarProducto($producto){
        $productoControlador = new ProductoControlador();
        return $productoControlador->Insert($producto->nombre, $producto->existencia, $producto->precio);
    }

    function SelectProductoById($id){
        $productoControlador = new ProductoControlador();
        return $productoControlador->GetById($id);
    }

    function EliminarProducto($producto){
        $productoControlador = new ProductoControlador();
        $productoControlador->Delete($producto->id);
    }

?>
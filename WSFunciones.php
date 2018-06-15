<?php
    include "modelos/ProductoModelo.php";
    include "modelos/UsuarioModelo.php";
    include "controladores/UsuarioControlador.php";
    include "controladores/ProductoControlador.php";
    include "controladores/LoggerControlador.php";

    function Ingresar($usuario){
        $usuario = (object) $usuario;
        $usuarioControlador = new UsuarioControlador();
        return $usuarioControlador->login($usuario->username,$usuario->password);
    }

    function RegistrarCuenta($usuario){
        $usuario = (object)$usuario;
        $usuarioControlador = new UsuarioControlador();
        $check = $usuarioControlador->GetById($usuario->username);
        if($check==null){
            $usuarioControlador->Insert($usuario->username,$usuario->password);
            return 1;
        }else return 3;
    }
    

    function SetHash($usuario){
        $usuario = (object)$usuario;
        $usuarioControlador = new UsuarioControlador();
        $usuarioControlador->SetHash($usuario->username,$usuario->hash);
    }

    function CheckHash($hash){
        $usuarioControlador = new UsuarioControlador();
        $bool = $usuarioControlador->Check($hash);
        if($bool)return 0;
        else return 1;
    }

    function AgregarProducto($producto){
        $producto = (object)$producto;
        $productoControlador = new ProductoControlador();
        return $productoControlador->Insert($producto->nombre, $producto->existencia, $producto->precio);
    }

    function SelectProductoById($id){
        $productoControlador = new ProductoControlador();
        return $productoControlador->GetById($id);
    }

    function EliminarProducto($producto){
        $producto=(object)$producto;
        $productoControlador = new ProductoControlador();
        $productoControlador->Delete($producto->id);
    }

    function ListaProducto(){
        $productoControlador = new ProductoControlador();
        return (array)$productoControlador->Select();
    }

    function ModificarProducto($producto){
        $producto = (object)$producto;
        $productoControlador = new ProductoControlador();
        $productoControlador->Update($producto->id,$producto->nombre,$producto->existencia,$producto->precio);
    }

    function LogEliminar($usuario,$producto){
        $usuario = (object)$usuario;
        $producto = (object)$producto;
        $loggerControlador = new LoggerControlador();
        $loggerControlador->Eliminar($usuario,$producto);
    }

    function LogIEliminar($usuario,$producto){
        $usuario = (object)$usuario;
        $producto = (object)$producto;
        $loggerControlador = new LoggerControlador();
        $loggerControlador->IEliminar($usuario,$producto);
    }

    function LogAgregar($usuario,$producto){
        $usuario = (object)$usuario;
        $producto = (object)$producto;
        $loggerControlador = new LoggerControlador();
        $loggerControlador->Agregar($usuario,$producto);
    }

    function LogModificar($usuario,$producto){
        $usuario = (object)$usuario;
        $producto = (object)$producto;
        $loggerControlador = new LoggerControlador();
        $loggerControlador->Modificar($usuario,$producto);
    }

    function LogIModificar($usuario,$producto){
        $usuario = (object)$usuario;
        $producto = (object)$producto;
        $loggerControlador = new LoggerControlador();
        $loggerControlador->IModificar($usuario,$producto);
    }

?>
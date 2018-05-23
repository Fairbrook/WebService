<?php

    /**
     * No tocar
     */
    require "WSFunciones.php";
    $namespace = "http://localhost/WebService/WebService.php";
    $server = new soap_server();
    $server->configureWSDL("AplicacionDistribuidos");
    $server->wsdl->schemaTargetNamespace = $namespace;
    
    

    /**
     * Definir aqui todos los tipos de datos no nativos. Orden de los parametros:
     * nombre del tipo de dato. en este caso del modelo
     * 'complexType' no le muevan
     * 'struct' no le muevan
     * 'all' no le muevan
     * '' no le muevan
     * array(
     *  'nombre del atributo'=>array('name'=>'nombre del atributo','type'=>'tipo de dato')
     * )
     */    
    $server->wsdl->addComplexType(
        'Usuario',
        'complexType',
        'struct',
        'all',
        '',
        array(
            'username'=>array('name'=>'username','type'=>'xsd:string'),
            'password'=>array('name'=>'password','type'=>'xsd:string'),
            'hash'=>array('name'=>'hash','type'=>'xsd:string')
        )
    );

    $server->wsdl->addComplexType(
        'Producto',
        'complexType',
        'struct',
        'all',
        '',
        array(
            'id'=>array('name'=>'id','type'=>'xsd:int'),
            'nombre'=>array('name'=>'nombre','type'=>'xsd:string'),
            'existencia'=>array('name'=>'existencia','type'=>'xsd:int'),
            'precio'=>array('name'=>'precio','type'=>'xsd:float')
        )
    );

    /**
     * Registrar todas las funciones una por una. Orden de los parametros:
     * nombre de la funcion. si tiene que ser el mismo
     * array con los parametros. array('nombre del parametro'=>'tipo de dato')
     * array con el valor devuelto. array('return'=>'tipo de dato')
     *      tns = dato no nativo. creado en la sección de arriba
     *      xsd = dato nativo 
     */
    $server->register(
        'Ingresar',
        array('usuario'=>'tns:Usuario'),
        array('return'=>'xsd:integer')
    );

    $server->register(
        'RegistrarCuenta',
        array('usuario'=>'tns:Usuario'),
        array('return'=>'xsd:integer')
    );

    $server->register(
        'SetHash',
        array('usuario'=>'tns:Usuario')
    );

    $server->register(
        'CheckHash',
        array('usuario'=>'xsd:string'),
        array('return'=>'xsd:integer')
    );

    $server->register(
        'AgregarProducto',
        array('producto'=>'tns:Producto'),
        array('return'=>'xsd:integer')
    );

    $server->register(
        'SelectProductoById',
        array('id'=>'xsd:integer'),
        array('return'=>'tns:Producto')
    );

    $server->register(
        'EliminarProducto',
        array('producto'=>'tns:Producto')
    );

    $server->register(
        'ListaProducto',
        array(),
        array('return'=>'xsd:Array')
    );

    $server->register(
        'ModificarProducto',
        array('producto'=>'tns:Producto')
    );

    $server->register(
        'LogEliminar',
        array('usuario'=>'tns:Usuario','producto'=>'tns:Producto')
    );

    $server->register(
        'LogIEliminar',
        array('usuario'=>'tns:Usuario','producto'=>'tns:Producto')
    );

    $server->register(
        'LogAgregar',
        array('usuario'=>'tns:Usuario','producto'=>'tns:Producto')
    );

    $server->register(
        'LogModificar',
        array('usuario'=>'tns:Usuario','producto'=>'tns:Producto')
    );

    $server->register(
        'LogIModificar',
        array('usuario'=>'tns:Usuario','producto'=>'tns:Producto')
    );

    /**
     * no tocar
     */
    $server->service(file_get_contents("php://input"));
?>
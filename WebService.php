<?php
    /**
     * No tocar
     */
    include "WSFunciones.php";
    $namespace = "http://localhost/WebService/WebService.php";
    $server = new soap_server();
    $server->wsdl->schemaTargetNamespace = $namespace;
    $server->configureWSDL("AplicacionDistribuidos");
    

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

    /**
     * Registrar todas las funciones una por una. Orden de los parametros:
     * nombre de la funcion. si tiene que ser el mismo
     * array con los parametros. array('nombre del parametro'=>'tipo de dato')
     * array con el valor devuelto. array('return'=>'tipo de dato')
     *      tns = dato no nativo. creado en la sección de arriva
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
        array('usuario'=>'tns:Usuario'),
        array('return'=>'xsd:null')
    );

    /**
     * no tocar
     */
    $server->service(file_get_contents("php://input"));
?>
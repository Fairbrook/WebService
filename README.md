# WebService

## Bases de datos
Principal [coco.sql](https://drive.google.com/open?id=11EXlMvpmJjTeV7DNMLtmibzNauLNmgTF)

Log [log.sql](https://drive.google.com/open?id=16RlMzFRVcaMpxuj1MKrWunqDdxp58sOh)


## Ejemplo nusoap
[Web Service basico](http://www.qualityinfosolutions.com/servicio-web-basico-con-nusoap-php/)

## Metodos del web service

### Usuario

Método WS | _return_
----------- | ------------
Ingresar (usuario) | 1 --> Login Exitoso; 0 --> Login no exitoso
RegistrarCuenta (usuario) | 3 --> Ya existe ese nombre de usuario; 1 --> Cuenta creada exitosamente
SetHash (usuario) | null
CheckHash (hash) | 1 --> No han iniciado sesión con otra cuenta; default --> El hash ha cambiado

### Producto

Método WS | _return_
----------- | ------------
??? | ???
AgregarProducto (producto) | null --> Ya existe el producto; idProducto insertado --> Correcta la inserción
SelectProductoById (id) | 0 --> El producto con determinado "id" no existe; ModeloProducto --> Producto encontrado
EliminarProducto (producto) | null
??? | ???

### Logger
Todos los métodos de WS reciben lo mismo: UsuarioModelo, ProductoModelo; al igual que los métodos del controlador.


## Lista de tareas
- [ ] Ingresar (falta cambiar nombre)
- [ ] RegistrarCuenta
- [ ] SetHash
- [ ] CheckHash
- [ ] AgregarProducto
- [ ] SelectProductoById
- [ ] EliminarProducto
- [ ] _Funciones del loger_

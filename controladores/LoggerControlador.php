<?php include "database/DBLog.php";

    Class LoggerControlador extends DBLog {
        public function Eliminar($usuario,$producto){
            $this->start();
            $stmt = $this->pdo->prepare(
                "INSERT INTO logger(usuario,fecha,accion,id_producto,nombre,existencia,precio)
                VALUES (
                    :usuario,
                    :date,
                    :accion,
                    :id_producto,
                    :nombre,
                    :existencia,
                    :precio
                )
            ");
            date_default_timezone_set('America/Mexico_City');
            $date = date("Y-m-d H:i:s");
            $stmt->execute([
                'usuario'       =>  $usuario->username,
                'date'          =>  $date,
                'accion'        =>  "B",
                'id_producto'   =>  $producto->id,
                'nombre'        =>  $producto->nombre,
                'existencia'    =>  $producto->existencia,
                'precio'        =>  $producto->precio
            ]);
            $this->stop();
        }
        public function IEliminar($usuario,$producto){
            $this->start();
            $stmt = $this->pdo->prepare(
                "INSERT INTO logger(usuario,fecha,accion,id_producto,nombre,existencia,precio)
                VALUES (
                    :usuario,
                    :date,
                    :accion,
                    :id_producto,
                    :nombre,
                    :existencia,
                    :precio
                )
            ");
            date_default_timezone_set('America/Mexico_City');
            $date = date("Y-m-d H:i:s");
            $stmt->execute([
                'usuario'       =>  $usuario->username,
                'date'          =>  $date,
                'accion'        =>  "IB",
                'id_producto'   =>  $producto->id,
                'nombre'        =>  $producto->nombre,
                'existencia'    =>  $producto->existencia,
                'precio'        =>  $producto->precio
            ]);
            $this->stop();
        }
        public function Agregar($usuario,$producto){
            $this->start();
            $stmt = $this->pdo->prepare(
                "INSERT INTO logger(usuario,fecha,accion,id_producto,nombre,existencia,precio)
                VALUES (
                    :usuario,
                    :date,
                    :accion,
                    :id_producto,
                    :nombre,
                    :existencia,
                    :precio
                )
            ");
            date_default_timezone_set('America/Mexico_City');
            $date = date("Y-m-d H:i:s");
            $stmt->execute([
                'usuario'       =>  $usuario->username,
                'date'          =>  $date,
                'accion'        =>  "A",
                'id_producto'   =>  $producto->id,
                'nombre'        =>  $producto->nombre,
                'existencia'    =>  $producto->existencia,
                'precio'        =>  $producto->precio
            ]);
            $this->stop();
        }
        public function Modificar($usuario,$producto){
            $this->start();
            $stmt = $this->pdo->prepare(
                "INSERT INTO logger(usuario,fecha,accion,id_producto,nombre,existencia,precio)
                VALUES (
                    :usuario,
                    :date,
                    :accion,
                    :id_producto,
                    :nombre,
                    :existencia,
                    :precio
                )
            ");
            date_default_timezone_set('America/Mexico_City');
            $date = date("Y-m-d H:i:s");
            $stmt->execute([
                'usuario'       =>  $usuario->username,
                'date'          =>  $date,
                'accion'        =>  "E",
                'id_producto'   =>  $producto->id,
                'nombre'        =>  $producto->nombre,
                'existencia'    =>  $producto->existencia,
                'precio'        =>  $producto->precio
            ]);
            $this->stop();
        }
        public function IModificar($usuario,$producto){
            $this->start();
            $stmt = $this->pdo->prepare(
                "INSERT INTO logger(usuario,fecha,accion,id_producto,nombre,existencia,precio)
                VALUES (
                    :usuario,
                    :date,
                    :accion,
                    :id_producto,
                    :nombre,
                    :existencia,
                    :precio
                )
            ");
            date_default_timezone_set('America/Mexico_City');
            $date = date("Y-m-d H:i:s");
            $stmt->execute([
                'usuario'       =>  $usuario->username,
                'date'          =>  $date,
                'accion'        =>  "IE",
                'id_producto'   =>  $producto->id,
                'nombre'        =>  $producto->nombre,
                'existencia'    =>  $producto->existencia,
                'precio'        =>  $producto->precio
            ]);
            $this->stop();
        }
    }
    
?>
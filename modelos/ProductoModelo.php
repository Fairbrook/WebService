<?php
    Class ProductoModelo {
        public $id;
        public $nombre;
        public $existencia;
        public $precio;
        public function __construct(){
        }
        public function set($id, $nombre, $existencia, $precio){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->existencia = $existencia;
            $this->precio = $precio;
        }
    }
?>
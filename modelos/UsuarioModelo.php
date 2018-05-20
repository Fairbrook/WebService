<?php

    Class UsuarioModelo {

        public $username;
        public $password;
        public $hash;

        public function __construct(){

        }

        public function set($username, $password, $hash){
            $this->username = $username;
            $this->password = $password;
            $this->hash = $hash;
        }

    }

?>
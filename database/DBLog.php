<?php 
    Class DBLog {
        private $host = "localhost";
        private $base = "log";
        private $user = "root";
        private $pwd = "";
        private $charset = "utf8";
        protected $pdo;
        public $status;
        protected function start(){
            try {
                $this->pdo = new PDO(
                    'mysql:host='.$this->host.';dbname='.$this->base.';charset='.$this->charset,
                    $this->user,
                    $this->pwd
                );
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                $this->status = 202;
                return true;
            } catch (PDOException $ex) {
                $this->status = 503;
                return false;
            }
        }
        protected function stop(){
            $this->pdo = null;
        }
    }
?>
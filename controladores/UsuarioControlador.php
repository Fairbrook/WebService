<?php
    include "database/DBConexion.php";

    Class UsuarioControlador extends DBConexion {

        public $result = 1;
        private $tabla = "usuarios";
        public $key = '';
        private $fields = array(
            "user" => "username",
            "pwd"  => "password",
            "hash" => "hash"
        );

        public function __construct(){}

        public function Login($username,$password){

                $this->start();
                
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM ".$this->tabla." ".
                    "WHERE ".$this->fields["user"]." = :username AND ".$this->fields["pwd"]." = :password"
                );
                
                $stmt->execute([
                    'username' => $username,
                    'password' => $password 
                ]);

                //$this->stop();
                
                if($stmt->rowCount() > 0){ 

                    $key = hash("sha256",(string)mt_rand(10, 1000));
                    $stmt = $this->pdo->prepare("UPDATE ".$this->tabla." SET  hash = :hash WHERE ".$this->fields["user"]." = :username");
                    $stmt->execute([
                        "hash" => $key,
                        "username" => $username
                    ]);
                return 1;

                }
                else{
                    return 0;
                }
                
        }       

        public function Check($hash){
                $this->start();
                $key = $hash;
                $stmt = $this->pdo->prepare(
                    "SELECT * FROM " . $this->tabla . " " .
                    "WHERE " . $this->fields["hash"] . " = :key"
                );

                $stmt->execute([
                    'key' => $key
                ]);

                if($stmt->rowCount() == 1):
                    return false;
                else:
                    return true;
                endif;

            

        }

     public function Insert($username,$password){
        $this->start();
                $key = hash("sha256",(string)mt_rand(10, 1000));

                $stmt = $this->pdo->prepare(
                    "INSERT INTO ".$this->tabla."
                    (
                        ".$this->fields["user"].",
                        ".$this->fields["pwd"].",
                        ".$this->fields["hash"]."
                    ) VALUES (
                        :username,
                        :password,
                        :hash
                    )
                ");

                $stmt->execute([
                    'username' => $username,
                    'password' => $password,
                    'hash' => $key
                ]);
                $this->stop();
          

        }
    public function Select(){
        $this->start();
            $stmt = $this->pdo->prepare("SELECT * FROM ".$this->tabla);
            $stmt->execute();

            $lista = array();
            while($fila = $stmt->fetch(PDO::FETCH_ASSOC)):
                $usuario = new UsuarioModelo();
                $usuario->set(
                    $fila[$this->fields["user"]],
                    $fila[$this->fields["pwd"]],
                    $fila[$this->fields["hash"]]
                );
                $lista[] = $usuario;
            endwhile;
            $this->stop();
            return $lista;
        }
    
    public function GetById($username){
        $this->start();
            $stmt = $this->pdo->prepare("SELECT * FROM ".$this->tabla." WHERE ".$this->fields["user"]." = :username");
            $stmt->execute([
                'username' => $username
            ]);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->stop();
            if($fila!=false){
                $usuario = new UsuarioModelo();
                $usuario->set(
                    $fila[$this->fields["user"]],
                    $fila[$this->fields["pwd"]],
                    $fila[$this->fields["hash"]]
                );
                
                return $usuario;
            }else return null;
    }

    public function SetHash($username, $hash){
        $this->start();
        $stmt = $this->pdo->prepare("UPDATE {$this->tabla} SET
        {$this->fields['hash']}= :hash
        WHERE {$this->fields['user']}= :username");
        $stmt->execute([
            'hash'=>$hash,
            'username'=>$username
        ]);
        $this->stop();
    }
}

?>
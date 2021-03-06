<?php 

 Class ProductoControlador extends DBConexion{
 	 public $result;
        private $tabla = "productos";
        private $fields = array(
            "id" => "id",
            "nombre"  => "nombre",
            "exist" => "existencia",
            "precio" => "precio"
        );
     public function __construct(){}

        public function Select(){
            $this->start();
        	 $stmt = $this->pdo->prepare("SELECT * FROM ".$this->tabla);
        	  $stmt->execute();

        	 $lista = array();
            while($fila = $stmt->fetch(PDO::FETCH_ASSOC)):
                $producto = new ProductoModelo();
                $producto->set(
                    $fila[$this->fields["id"]],
                    $fila[$this->fields["nombre"]],
                    $fila[$this->fields["exist"]],
                    $fila[$this->fields["precio"]]
                );
                $lista[] =(array) $producto;
            endwhile;
            return $lista;
        } 
        public function Delete($id){
            $this->start();
        	$stmt = $this->pdo->prepare(
                "DELETE FROM ".$this->tabla." ".
                "WHERE ".$this->fields["id"]." = :id"
            );
            $stmt->execute([
                'id' => $id
            ]);
        }
        public function Insert($nombre,$existencia,$precio){
            $this->start();
    	        $stmt = $this->pdo->prepare(
                    "INSERT INTO ".$this->tabla."
                    (
                        ".$this->fields["nombre"].",
                        ".$this->fields["exist"].",
                        ".$this->fields["precio"]."
                    ) VALUES (
                        :nombre,
                        :exist,
                        :precio
                    )
                ");
                
                try {
                    $this->pdo->beginTransaction();
                    $stmt->execute([
                        'nombre' => $nombre,
                        'exist' => $existencia,
                        'precio' => $precio
                    ]);
                    $id = $this->pdo->lastInsertId();
                    $this->pdo->commit();
                    return $id;
                } catch(PDOException $ex) {
                    $this->pdo->rollback();
                }

                return 0;
        }
        public function Update($id,$nombre,$existencia,$precio){
            $this->start();
        	$stmt = $this->pdo->prepare(
                            "UPDATE ".$this->tabla.
                            " SET ".
                            $this->fields["nombre"]." = :nombre, ".
                            $this->fields["exist"]." = :exist, ".
                            $this->fields["precio"]." = :precio ".
                            " WHERE ".$this->fields["id"]." = :id"
                        );
                        $stmt->execute([
                            'nombre' => $nombre,
                            'exist' => $existencia,
                            'precio' => $precio,
                            'id' => $id
                        ]);
        }
        public function GetById($id){
            $this->start();
        	$stmt = $this->pdo->prepare("SELECT * FROM ".$this->tabla." WHERE ".$this->fields["id"]." = :id");
        	  $stmt->execute([
                'id' => $id
            ]);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                $producto = new ProductoModelo();
                $producto->set(
                    $fila[$this->fields["id"]],
                    $fila[$this->fields["nombre"]],
                    $fila[$this->fields["exist"]],
                    $fila[$this->fields["precio"]]
                );
              
            return $producto;
        }
 }
?>
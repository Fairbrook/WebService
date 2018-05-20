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
                $lista[] = $producto;
            endwhile;
            return $lista;
        } 
        public function Delete($id){
        	$stmt = $this->pdo->prepare(
                "DELETE FROM ".$this->tabla." ".
                "WHERE ".$this->fields["id"]." = :id"
            );
            $stmt->execute([
                'id' => $id
            ]);
        }
        public function Insert($nombre,$existencia,$precio){
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
                
                $stmt->execute([
                    'nombre' => $nombre,
                    'exist' => $existencia,
                    'precio' => $precio
                ]);
        }
        public function Update($id,$nombre,$existencia,$precio){
        	$stmt = $this->pdo->prepare(
                            "UPDATE ".$this->tabla.
                            " SET ".
                            $this->fields["nombre"]." = :nombre, ".
                            $this->fields["exist"]." = :exist, ".
                            $this->fields["precio"]." = :precio ".
                            "WHERE ".$this->fields["id"]." = :id"
                        );
                        $stmt->execute([
                            'nombre' => $nombre,
                            'exist' => $existencia,
                            'precio' => $precio,
                            'id' => $id
                        ]);
        }
        public function GetById($id){
        	 $stmt = $this->pdo->prepare("SELECT * FROM ".$this->tabla."HWERE ".$this->fields["id"]." = :id");
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
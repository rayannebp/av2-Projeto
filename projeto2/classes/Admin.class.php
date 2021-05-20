<?php
include ("classes/DB.class.php");
    class Admin extends DB{
        private $id;
        private $nome;
        private $email;
        private $telefone;

        public function __construct($id=false){
            if($id){
                $sql = "SELECT * FROM admin WHERE id =  :id";
                $stmt = DB::Conexao()->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                foreach($stmt as $registro){
                    $this->setId($registro['id']);
                    $this->setNome($registro['nome']);
                    $this->setEmail($registro['email']);
                    $this->setTelefone($registro['telefone']);
                }
            }
        }


        public function setId($id){
            $this->id = $id;
        }

        public function setNome($string){
            $this->nome = $string;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public static function selecionar($id){
            $sql = "SELECT * FROM admin WHERE id=$id";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchALL(PDO::FETCH_ASSOC); 

            if($registros){
                $itens = array();

                foreach($registros as $registro){
                    $objTemporario = new Admin();
                    $objTemporario->setId($registro['id']);
                    $objTemporario->setNome($registro['nome']);
                    $objTemporario->setEmail($registro['email']);
                    $objTemporario->setTelefone($registro['telefone']);
                    $itens[] = $objTemporario;
                }

                return $itens;
            }
            return false;
        }
        
        public static function listar(){
            $sql = "SELECT * FROM admin";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchALL(PDO::FETCH_ASSOC); 

            if($registros){
                $itens = array();

                foreach($registros as $registro){
                    $objTemporario = new Admin();
                    $objTemporario->setId($registro['id']);
                    $objTemporario->setNome($registro['nome']);
                    $objTemporario->setEmail($registro['email']);
                    $objTemporario->setTelefone($registro['telefone']);
                    $itens[] = $objTemporario;
                }

                return $itens;
            }
            return false;
        }

        public function adicionar(){
            try{
                
                $sql = "INSERT INTO admin (nome, email, telefone )
                VALUES (:nome, :email, :telefone)";

                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':nome', $this->nome);
                $stmt->bindParam(':email', $this->email );
                $stmt->bindParam(':telefone', $this->telefone);
                $stmt->execute();

            }catch(PDOException $e){
                echo "ERRO AO ADICIONAR: ".$e->getMessage();
            }
        }

        public function atualizar(){
            if($this->id){
                try{
                    $sql = "UPDATE admin SET
                            nome = :nome,
                            email = :email,
                            telefone = :telefone
                            WHERE id = :id";
                    $stmt = DB::conexao()->prepare($sql);
                    $stmt->bindParam(':nome', $this->nome);
                    $stmt->bindParam(':email', $this->email);
                    $stmt->bindParam(':telefone', $this->telefone);
                    $stmt->bindParam(':id', $this->id);
                    $stmt->execute();
                    
                }catch(PDOExcetion $e){
                    echo "ERRO AO ATUALIZAR: ".$e->getMessage();
                } 
            }            
        }

        public function excluir(){
            if($this->id){
                try{
                    $sql = "DELETE FROM admin WHERE id = :id";

                    $stmt = DB::Conexao()->prepare($sql);
                    $stmt->bindParam(":id", $this->id);
                    $stmt->execute();

                }catch(PDOExcetion $e){
                    echo "ERRO AO EXCLUIR: ".$e->getMessage();
                } 
            }
        }
        
    }
?>

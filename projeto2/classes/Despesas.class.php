<?php
include ("classes/DB.class.php");
    class Despesa extends DB{
        private $id_despesa;
        private $id_cliente;
        private $despesa;
        private $valor;
        private $data;

        public function __construct($id_despesa=false){
            if($id_despesa){
                $sql = "SELECT * FROM despesas WHERE id_cliente =  :id_cliente";
                $stmt = DB::Conexao()->prepare($sql);
                $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
                $stmt->execute();

                foreach($stmt as $registro){
                    $this->setIdDespesa($registro['id_despesa']);
                    $this->setIdCliente($registro['id_cliente']);
                    $this->setDespesa($registro['despesa']);
                    $this->setValor($registro['valor']);
                    $this->setData($registro['data']);
                }
            }
        }


        public function setIdDespesa($id_despesa){
            $this->id_despesa = $id_despesa;
        }

        public function setIdCliente($id_cliente){
            $this->id_cliente = $id_cliente;
        }

        public function setDespesa($despesa){
            $this->despesa = $despesa;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }

        public function setData($data){
            $this->data = $data;
        }

        public function getIdDespesa(){
            return $this->id_despesa;
        }

        public function getIdCliente(){
            return $this->id_cliente;
        }

        public function getDespesa(){
            return $this->despesa;
        }

        public function getValor(){
            return $this->valor;
        }

        public function getData(){
            return $this->data;
        }

        public static function selecionar($id){
            $sql = "SELECT * FROM despesas WHERE id_despesa=$id";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchALL(PDO::FETCH_ASSOC); 

            if($registros){
                $itens = array();

                foreach($registros as $registro){
                    $objTemporario = new Despesa();
                    $objTemporario->setIdDespesa($registro['id_despesa']);
                    $objTemporario->setIdCliente($registro['id_cliente']);
                    $objTemporario->setDespesa($registro['despesa']);
                    $objTemporario->setValor($registro['valor']);
                    $objTemporario->setData($registro['data']);
                    $itens[] = $objTemporario;
                }

                return $itens;
            }
            return false;
        }
        public static function listar(){
            $sql = "SELECT * FROM despesas";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchALL(PDO::FETCH_ASSOC); 

            if($registros){
                $itens = array();

                foreach($registros as $registro){
                    $objTemporario = new Despesa();
                    $objTemporario->setIdDespesa($registro['id_despesa']);
                    $objTemporario->setIdCliente($registro['id_cliente']);
                    $objTemporario->setDespesa($registro['despesa']);
                    $objTemporario->setValor($registro['valor']);
                    $objTemporario->setData($registro['data']);
                    $itens[] = $objTemporario;
                }

                return $itens;
            }
            return false;
        }

        public function adicionar(){
            try{
                
                $sql = "INSERT INTO despesas (id_cliente, despesa, valor, data)
                VALUES (:id_cliente, :despesa, :valor, :data)";

                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':id_cliente', $this->id_cliente);
                $stmt->bindParam(':despesa', $this->despesa );
                $stmt->bindParam(':valor', $this->valor);
                $stmt->bindParam(':data', $this->data);
                $stmt->execute();

            }catch(PDOException $e){
                echo "ERRO AO ADICIONAR: ".$e->getMessage();
            }
        }

        public function atualizar(){
            if($this->id_despesa){
                try{
                    $sql = "UPDATE despesas SET
                            despesa = :despesa,
                            valor = :valor,
                            data = :data
                            WHERE id_despesa = :id_despesa";
                    $stmt = DB::conexao()->prepare($sql);
                    $stmt->bindParam(':despesa', $this->despesa);
                    $stmt->bindParam(':valor', $this->valor);
                    $stmt->bindParam(':data', $this->data);
                    $stmt->bindParam(':id_despesa', $this->id_despesa);
                    $stmt->execute();
                    
                }catch(PDOExcetion $e){
                    echo "ERRO AO ATUALIZAR: ".$e->getMessage();
                } 
            }            
        }

        public function excluir(){
            if($this->id_despesa){
                try{
                    $sql = "DELETE FROM despesas WHERE id_despesa = :id_despesa";

                    $stmt = DB::Conexao()->prepare($sql);
                    $stmt->bindParam(":id_despesa", $this->id_despesa);
                    $stmt->execute();

                }catch(PDOExcetion $e){
                    echo "ERRO AO EXCLUIR: ".$e->getMessage();
                } 
            }
        }
        
    }
?>

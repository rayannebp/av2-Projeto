<?php
include ("classes/DB.class.php");
    class Relatorio extends DB{
        private $id;
        private $id_cliente;
        private $mes;
        private $ano;
        private $valor;
        
        public function __construct($id_despesa=false){
            if($id_despesa){
                $sql = "SELECT * FROM relatorios WHERE id_cliente =  :id_cliente";
                $stmt = DB::Conexao()->prepare($sql);
                $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
                $stmt->execute();

                foreach($stmt as $registro){
                    $this->setId($registro['id']);
                    $this->setIdCliente($registro['id_cliente']);
                    $this->setMes($registro['mes']);
                    $this->setAno($registro['ano']);
                    $this->setValor($registro['valor']);
                }
            }
        }


        public function setId($id){
            $this->id = $id;
        }

        public function setIdCliente($id_cliente){
            $this->id_cliente = $id_cliente;
        }

        public function setMes($mes){
            $this->mes = $mes;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }

        public function setAno($ano){
            $this->ano = $ano;
        }

        public function getId(){
            return $this->id;
        }

        public function getIdCliente(){
            return $this->id_cliente;
        }

        public function getMes(){
            return $this->mes;
        }

        public function getValor(){
            return $this->valor;
        }

        public function getAno(){
            return $this->ano;
        }

        public static function selecionar($id){
            $sql = "SELECT * FROM relatorios WHERE id=$id";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchALL(PDO::FETCH_ASSOC); 

            if($registros){
                $itens = array();

                foreach($registros as $registro){
                    $objTemporario = new Relatorio();
                    $objTemporario->setId($registro['id']);
                    $objTemporario->setIdCliente($registro['id_cliente']);
                    $objTemporario->setMes($registro['mes']);
                    $objTemporario->setValor($registro['valor']);
                    $objTemporario->setAno($registro['ano']);
                    $itens[] = $objTemporario;
                }

                return $itens;
            }
            return false;
        }
        public static function listar(){
            $sql = "SELECT * FROM relatorios";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchALL(PDO::FETCH_ASSOC); 

            if($registros){
                $itens = array();

                foreach($registros as $registro){
                    $objTemporario = new Relatorio();
                    $objTemporario->setId($registro['id']);
                    $objTemporario->setIdCliente($registro['id_cliente']);
                    $objTemporario->setMes($registro['mes']);
                    $objTemporario->setValor($registro['valor']);
                    $objTemporario->setAno($registro['ano']);
                    $itens[] = $objTemporario;
                }

                return $itens;
            }
            return false;
        }

        public function adicionar(){
            try{
                
                $sql = "INSERT INTO relatorios (id_cliente, mes, valor, ano)
                VALUES (:id_cliente, :mes, :valor, :ano)";

                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':id_cliente', $this->id_cliente);
                $stmt->bindParam(':mes', $this->mes );
                $stmt->bindParam(':valor', $this->valor);
                $stmt->bindParam(':ano', $this->ano);
                $stmt->execute();

            }catch(PDOException $e){
                echo "ERRO AO ADICIONAR: ".$e->getMessage();
            }
        }

        public function atualizar(){
            if($this->id){
                try{
                    $sql = "UPDATE relatorios SET
                            mes = :mes,
                            valor = :valor,
                            ano = :ano
                            WHERE id = :id";
                    $stmt = DB::conexao()->prepare($sql);
                    $stmt->bindParam(':mes', $this->mes);
                    $stmt->bindParam(':valor', $this->valor);
                    $stmt->bindParam(':ano', $this->ano);
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
                    $sql = "DELETE FROM relatorios WHERE id = :id";

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

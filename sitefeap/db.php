<?php
class BancoDeDados {
    private $host = "localhost";
    private $db = "bdfeap";
    private $usuario = "root";
    private $senha = "";
    private $conn;

    public function conectar () {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=".$this->host. ";dbname=".$this->db, $this->usuario, $this->senha);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Erro de conexão: ".$exception->getMessage();
        }
        return $this->conn;
        
    }
    
    public function validarUsuario ($usuario, $senha){
        if ($this->conn) {
            try {
                $query = "SELECT * FROM usuarios WHERE login = :usuario"; 
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':usuario', $usuario);
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row){
                    if($senha == $row['senha']){
                        session_start();
                        $_SESSION['email']=$row['email'];
                        return $row;
                    } else {
                        return false; 
                    } 
                } else {
                        return false; 
                    }
                
            } catch (PDOException $e) {
                echo "Erro na validação: ".$e->getMessage();
                return false;
            }
        }
        return false; 
    }


    public function inserirRegistro($tabela, $dados){
        if ($this->conn){
            try{
                $colunas = implode(",", array_keys($dados));
                $placeholders = implode(",", array_map(fn($col) => ":$col", array_keys($dados)));

                $query = "INSERT INTO $tabela ($colunas) VALUES ($placeholders)"; 
                $stmt = $this->conn->prepare($query);
                foreach ($dados as $coluna => $valor) {
                    $stmt->bindValue(":$coluna", $valor);
                } 
                $stmt->execute();
                return true; 

            } catch (PDOException $e) {
                echo "Erro ao inserir: ".$e->getMessage();
                return false;
            }
        } else {
            echo "Conexão não estabelecida";
            return false;
        }
    }
    
    public function listarRegistros($tabela){
        $resultados = [];
        if ($this->conn){
            try {
                $query = "SELECT * FROM ".$tabela;
                
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                     
                        $resultados[] = $row;
                }
            } catch (PDOException $e) {
                echo "Erro no cadastro: ".$e->getMessage();
                return [];
            }
            return $resultados;
        }
    }


    public function atualizarRegistro($tabela, $dados, $condicoes) {
        if ($this->conn){
            try {
                $colunas = implode(", ", array_map(fn($col)=>"$col = :$col", 
                array_keys($dados)));
                $condicoesS = implode(" AND ", array_map(fn($col)=>"$col = :$col",
                array_keys($condicoes)));

                $query = "UPDATE $tabela SET $colunas WHERE $condicoesS";
                $stmt = $this->conn->prepare($query);
                foreach ($dados as $coluna => $valor){
                    $stmt->bindValue(":$coluna", $valor);
                }

                foreach ($condicoes as $coluna => $valor) {
                    $stmt->bindValue(":$coluna", $valor);
                }

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erro ao atualizar: ".$e->getMessage();
                return false;
            }
        } else {
            echo "Conexão não estabelecida";
            return false;
        }

    }
     


    public function deletarRegistro($tabela, $condicoes){
        if ($this->conn){
            try {
                $condicoesS = implode(" AND ", array_map(fn($col)=>"$col = :$col",
                array_keys($condicoes)));
                $query = "DELETE FROM $tabela WHERE $condicoesS";
                $stmt = $this->conn->prepare($query);
                foreach ($condicoes as $coluna => $valor) {
                    $stmt->bindValue(":$coluna", $valor);
                }
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Erro ao deletar: ".$e->getMessage();
                return false;
            }
        } else {
            echo "Conexão não estabelecida";
            return false;
        }
    }


    public function buscarRegistros($tabela, $valor, $campo){
            $resultados = [];
            if ($this->conn){
                try {
                    // Valide $tabela e $campo antes de usar em produção!
                    $query = "SELECT * FROM $tabela WHERE $campo LIKE :valor";
                    
                    $stmt = $this->conn->prepare($query);
                    $stmt->bindValue(':valor', "%$valor%", PDO::PARAM_STR); // LIKE com % no início e no fim
                    $stmt->execute();
        
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $resultados[] = $row;
                    }
                } catch (PDOException $e) {
                    echo "Erro na consulta: ".$e->getMessage();
                    return [];
                }
                return $resultados;
            }
        }

        public function buscarRegistroPorId($tabela, $id, $campo){
        if ($this->conn){
            try {
                $query = "SELECT * FROM $tabela WHERE $campo= :id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(":id",$id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erro ao buscar registros: ".$e->getMessage();
                return null;
                //throw $th;
            } 

            } else {
                echo "Conexão não estabelecida";
                return null;
            }
        }



}
?>
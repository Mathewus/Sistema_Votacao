<?php

require_once('app/Database/ConexaoDB.php');

class ControllerEleitor
{
    public function createEleitor(Eleitor $eleitor){
        try{
            $insertEleitor = "INSERT INTO eleitor(nome_eleitor, cpf, idade, id_candidato) VALUES (:nome_eleitor, :cpf, :idade, :id_candidato)";
            $stmt = ConexaoDB::getConn()->prepare($insertEleitor);
            $stmt->bindValue(':nome_eleitor', $eleitor->getNome_eleitor());
            $stmt->bindValue(':cpf', $eleitor->getCpf());
            $stmt->bindValue(':idade', $eleitor->getIdade());
            $stmt->bindValue(':id_candidato', $eleitor->getId_candidato());
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function readEleitor(){
        try{
            $queryEleitor = "SELECT * FROM eleitor";
            $stmt = ConexaoDB::getConn()->prepare($queryEleitor);
            $stmt->execute();

            if($stmt->rowCount()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function updateEleitor(Eleitor $eleitor){

    }

    public function deleteEleitor(int $id_eleitor){

    }
}

?>
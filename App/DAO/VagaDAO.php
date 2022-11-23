<?php

namespace App\DAO;

use App\Model\VagaModel;
use \PDO;

class VagaDAO extends DAO {

    public $conexao;
    public function __construct()
    {
        parent::__construct();  
    } 

    public function getAllRows(){
        $sql = "SELECT * FROM vaga;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getbyTitulo($query)
    {
        $dados = "%" . $query . "%";
        $sql = "SELECT  * FROM vaga
                WHERE titulo LIKE ?;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados);        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
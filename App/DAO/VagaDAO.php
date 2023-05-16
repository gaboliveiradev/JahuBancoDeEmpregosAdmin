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
        
        
        $sql = "SELECT v.*, pj.* 
                FROM vaga v 
                JOIN pessoa_juridica pj ON (pj.id_pessoa = v.id_pessoa) ";
        
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getbyTitulo($query)
    {
        $dados = "%" . $query . "%";
        $sql = "SELECT * 
                FROM vaga v
                JOIN pessoa_juridica pj ON (pj.id_pessoa = v.id_pessoa)
                
                WHERE titulo LIKE ?;";
        
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados);        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function vagasPorSetor(){
        $sql = "SELECT v.setor, COUNT(v.id_vaga) AS total_vaga
        FROM vaga v
        GROUP BY v.setor";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function salarioPorSetor(){
        $sql = "SELECT v.setor, AVG(v.salario) AS media_salario_setor
        FROM vaga v
        GROUP BY v.setor";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
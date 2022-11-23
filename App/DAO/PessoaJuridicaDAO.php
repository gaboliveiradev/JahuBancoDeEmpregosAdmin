<?php

namespace App\DAO;

use App\Model\PessoaJuridicaModel;
use \PDO;

class PessoaJuridicaDAO extends PessoaDAO {

    public $conexao;
    public function __construct()
    {
        parent::__construct();  
    } 

    public function getAllRows(){
        $sql = "SELECT * FROM pessoa_juridica;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getbyRazao($query){
        $dados = "%" . $query . "%";
        $sql = "SELECT * FROM pessoa_juridica WHERE razao_social LIKE ?;";        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
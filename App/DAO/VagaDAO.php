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

    public function getVagaByIdJoinPessoaPessoaJuridica(int $id) 
    {
        $sql = "SELECT v.titulo, v.descricao, v.salario, v.setor, DATE_FORMAT(v.data_abertura, '%d/%m/%Y') AS data_abertura, DATE_FORMAT(v.data_fechamento, '%d/%m/%Y') AS data_fechamento, v.quantidade_ofertada, v.limite_candidatos, 
        v.situacao, v.vaga_deficiente, p.email, pj.nome_fantasia, pj.cnpj, pj.razao_social, e.logradouro, e.numero, e.cep, e.bairro, c.nome as nome_cidade, c.uf, c.codigo_ibge, c.ddd
        FROM vaga v
        LEFT JOIN pessoa p ON (p.id_pessoa = v.id_pessoa)
        LEFT JOIN pessoa_juridica pj ON (pj.id_pessoa = p.id_pessoa) 
        LEFT JOIN endereco e ON (e.id_pessoa = p.id_pessoa) 
        LEFT JOIN cidade c ON (c.id_cidade = e.id_cidade) WHERE v.id_vaga = ? GROUP BY v.id_vaga;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
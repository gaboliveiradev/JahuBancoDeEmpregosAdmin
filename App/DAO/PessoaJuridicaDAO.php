<?php

namespace App\DAO;

use App\Model\PessoaJuridicaModel;
use \PDO;

class PessoaJuridicaDAO extends PessoaDAO
{

    public $conexao;
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllRows()
    {
        $sql = "SELECT * FROM pessoa_juridica;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getbyRazao($query)
    {
        $dados = "%" . $query . "%";
        $sql = "SELECT * FROM pessoa_juridica WHERE razao_social LIKE ?;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function empresasPorBairro()
    {
        $sql = "SELECT e.bairro, COUNT(pj.id_pessoa_juridica) AS empresas_por_bairro
        FROM pessoa_juridica pj
        JOIN endereco e ON (e.id_pessoa = pj.id_pessoa)
        GROUP BY e.bairro";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function vagasPorBairro(){
        $sql = "SELECT e.bairro, COUNT(v.id_vaga) AS vagas_por_bairro
        FROM pessoa_juridica pj
        JOIN vaga v ON (v.id_pessoa = pj.id_pessoa)
        JOIN endereco e ON (e.id_pessoa = pj.id_pessoa)
        GROUP BY e.bairro";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getByIdJoinPessoaJuridicaEnderecoCidade(int $id) 
    {
        $sql = "SELECT pj.nome_fantasia, pj.razao_social, pj.cnpj, p.email, e.logradouro, e.numero, e.cep, e.bairro, c.nome, c.uf, c.codigo_ibge, c.ddd
        FROM pessoa_juridica pj 
        LEFT JOIN pessoa p ON (p.id_pessoa = pj.id_pessoa)
        LEFT JOIN endereco e ON (e.id_pessoa = p.id_pessoa)
        LEFT JOIN cidade c ON (c.id_cidade = e.id_cidade) WHERE pj.id_pessoa_juridica = ? GROUP BY pj.id_pessoa_juridica;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}

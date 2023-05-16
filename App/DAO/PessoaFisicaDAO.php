<?php

namespace App\DAO;

use App\Model\PessoaFisicaModel;
use \PDO;

class PessoaFisicaDAO extends PessoaDAO
{

    public $conexao;
    public function __construct()
    {
        parent::__construct();
    }

    public function getQualificacao()
    {
        $sql = "SELECT  pf.id_pessoa_fisica as id,
		                pf.nome as nome,
		                q.instituicao as instituicao,
		                q.curso as curso,
                        q.conteudo_curso as conteudo_curso       
                FROM qualificacao q
                JOIN pessoa_fisica pf on pf.id_pessoa_fisica = q.id_pessoa_fisica
                    ;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getAllRows()
    {
        $sql = "SELECT * FROM pessoa_fisica;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getbyNome($query)
    {
        $dados = "%" . $query . "%";
        $sql = "SELECT  pf.id_pessoa_fisica as id,
                    pf.nome as nome,
                     q.instituicao as instituicao,
                        q.curso as curso,
                        q.conteudo_curso as conteudo_curso       
                FROM qualificacao q
                JOIN pessoa_fisica pf on pf.id_pessoa_fisica = q.id_pessoa_fisica
                WHERE nome LIKE ?;";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function pessoasPorSexo()
    {
        $sql = "SELECT 
                    COUNT(id_pessoa_fisica) AS pessoas_por_sexo
                FROM pessoa_fisica
                GROUP BY sexo";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function curriculosPorBairro()
    {
        $sql = "SELECT e.bairro, COUNT(pf.id_pessoa_fisica) AS quantidade
        FROM pessoa_fisica pf
        JOIN endereco e ON (e.id_pessoa = pf.id_pessoa)
        GROUP BY e.bairro";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function idadePorBairro()
    {
        $sql = "SELECT e.bairro, AVG(TIMESTAMPDIFF(YEAR, pf.data_nascimento, NOW())) AS idade
        FROM pessoa_fisica pf
        JOIN endereco e ON (e.id_pessoa = pf.id_pessoa)
        GROUP BY e.bairro";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function idadePorSexo()
    {
        $sql = "SELECT pf.sexo, AVG(TIMESTAMPDIFF(YEAR, pf.data_nascimento, NOW())) AS idade
        FROM pessoa_fisica pf
        GROUP BY pf.sexo";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}

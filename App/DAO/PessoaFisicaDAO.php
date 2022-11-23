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

    public function getAllRows(){
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
}

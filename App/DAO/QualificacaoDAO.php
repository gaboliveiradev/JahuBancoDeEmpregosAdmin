<?php
namespace App\DAO;

use \PDO;

class QualificacaoDAO extends DAO {

	public function __construct()
    {
        parent::__construct();      
    }

    public function getQualificacaoById(int $id) 
    {
        $sql = "SELECT instituicao, curso, conteudo_curso, DATE_FORMAT(data_inicio, '%d/%m/%Y') AS data_inicio, DATE_FORMAT(data_conclusao, '%d/%m/%Y') AS data_conclusao FROM qualificacao WHERE id_pessoa_fisica = ?;";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}

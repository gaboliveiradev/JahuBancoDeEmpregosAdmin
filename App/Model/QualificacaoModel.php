<?php
namespace App\Model;

use App\DAO\QualificacaoDAO;

class QualificacaoModel extends Model {
    public $id, $id_pessoa_fisica, $instituicao, $curso, $conteudo_curso, $data_inicio, $data_conclusao;

	public function getQualificacaoById(int $id) 
	{
		$dao = new QualificacaoDAO();
		return $dao->getQualificacaoById( (int) $id );
	}
}

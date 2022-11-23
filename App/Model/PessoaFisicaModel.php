<?php

namespace App\Model;
use App\DAO\PessoaFisicaDAO;

class PessoaFisicaModel extends PessoaModel
{
    public $id_pessoa_fisica, $nome, $data_nascimento, $cpf, $sexo;

    public function getAll(){
        $dao = new PessoaFisicaDAO();

        return $dao->getAllRows();
    }

    public function getQualificacao(){
        $dao = new PessoaFisicaDAO();

        return $dao->getQualificacao();
    }

    public function getByNome($query){
        $dao = new PessoaFisicaDAO();

        return $dao->getbyNome($query);
    }
}
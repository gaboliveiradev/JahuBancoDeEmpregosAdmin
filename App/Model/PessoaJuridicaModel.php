<?php

namespace App\Model;

use App\DAO\PessoaJuridicaDAO;

class PessoaJuridicaModel extends PessoaModel
{
    public $id_pessoa_juridica, $nome_fantasia, $razao_social, $cnpj;

    public function getAll(){
        $dao = new PessoaJuridicaDAO();

        return $dao->getAllRows();
    }

    public function getByRazao($query){
        $dao = new PessoaJuridicaDAO();

        return $dao->getbyRazao($query);
    }
}
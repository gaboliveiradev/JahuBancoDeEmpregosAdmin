<?php

namespace App\Model;

use App\DAO\PessoaFisicaDAO;
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

    public function empresasPorBairro(){
        $dao = new PessoaJuridicaDAO();

        return $dao->empresasPorBairro();
    }

    public function vagasPorBairro(){
        $dao = new PessoaJuridicaDAO();

        return $dao->vagasPorBairro();
    }

    public function getByIdJoinPessoa(int $id) 
    {
        $dao = new PessoaJuridicaDAO();
        return $dao->getByIdJoinPessoa((int) $id);
    }
}
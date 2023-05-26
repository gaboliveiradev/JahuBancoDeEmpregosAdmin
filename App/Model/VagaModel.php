<?php

namespace App\Model;
use App\DAO\VagaDAO;

class VagaModel extends Model
{
    public $id_pessoa, $id_vaga, $titulo, $descricao, $salario, $setor;
    public $data_abertura, $data_fechamento;

    public $razao_social, $nome_fantasia;

    public function getAll(){
        $dao = new VagaDAO();

        return $dao->getAllRows();
    }   

    public function getByTitulo($query){
        $dao = new VagaDAO();

        return $dao->getbyTitulo($query);
    }

    public function vagasPorSetor(){
        $dao = new VagaDAO();

        return $dao->vagasPorSetor();
    }
    public function vagasPorBairro(){
        $dao = new VagaDAO();

        return $dao->vagasPorBairro();
    }

    public function salarioPorSetor(){
        $dao = new VagaDAO();

        return $dao->salarioPorSetor();
    }

    public function getVagaByIdJoinPessoaPessoaJuridica(int $id)
    {
        $dao = new VagaDAO();
        return $dao->getVagaByIdJoinPessoaPessoaJuridica( (int) $id );
    }
}
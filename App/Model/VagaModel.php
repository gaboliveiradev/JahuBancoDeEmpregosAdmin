<?php

namespace App\Model;
use App\DAO\VagaDAO;

class VagaModel extends Model
{
    public $id_pessoa, $id_vaga, $titulo, $descricao, $salario, $setor;
    public $data_abertura, $data_fechamento;

    public function getAll(){
        $dao = new VagaDAO();

        return $dao->getAllRows();
    }   

    public function getByTitulo($query){
        $dao = new VagaDAO();

        return $dao->getbyTitulo($query);
    }
}
<?php

namespace App\Controller;
use App\Model\PessoaFisicaModel;

class PessoaFisicaController extends Controller {

    public static function index() {
        parent::isAuthenticated();
        $model = new PessoaFisicaModel();        
        $model = $model->getQualificacao();       
        
        parent::render("Pessoa/ListarPessoa", $model);
    }

    public static function buscar(){
        parent::isAuthenticated();
        $model = new PessoaFisicaModel();
        if(isset($_GET['query'])){
            $model = $model->getByNome($_GET['query']);
        }

       parent::render("Pessoa/ListarPessoa", $model);
    }

    public static function curriculosByBairro(){
        parent::isAuthenticated();

        $model = new PessoaFisicaModel();
        $query = $model->curriculosPorBairro();
        parent::setResponseAsJSON($query);
     }
    public static function idadeBySexo(){ 
        parent::isAuthenticated();

        $model = new PessoaFisicaModel();
        $query = $model->idadePorSexo();
        parent::setResponseAsJSON($query);
    }
    public static function idadeByBairro(){ 
        parent::isAuthenticated();

        $model = new PessoaFisicaModel();
        $query = $model->idadePorBairro();
        parent::setResponseAsJSON($query);
    }

    public static function getById() 
    {
        parent::isAuthenticated();
        
        $model = new PessoaFisicaModel();
        parent::setResponseAsJSON($model->getByIdPessoaFisicaJoinPessoaQualificacaoEnderecoCidade( (int) $_GET['id']));
    }

}
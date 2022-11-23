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

}
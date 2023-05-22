<?php

namespace App\Controller;
use App\Model\VagaModel;

class VagaController extends Controller {

    public static function index() {
        parent::isAuthenticated();
        $model = new VagaModel();
        $model = $model->getAll();
        parent::render("Vaga/ListaVagaEmprego", $model);
    }    

    public static function buscar(){
        parent::isAuthenticated();
        $model = new VagaModel();
        if(isset($_GET['query'])){
            $model = $model->getByTitulo($_GET['query']);
        }

       parent::render("Vaga/ListaVagaEmprego", $model);
    }

    public static function getById()
    {
        parent::isAuthenticated();

        $model = new VagaModel();
        parent::setResponseAsJSON($model->getVagaByIdJoinPessoaPessoaJuridica( (int) $_GET['id'] ));
    }
}
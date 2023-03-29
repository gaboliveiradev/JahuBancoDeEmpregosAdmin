<?php

namespace App\Controller;
use App\Model\PessoaJuridicaModel;

class EmpresaController extends Controller {

    public static function index() {
        parent::isAuthenticated();
        $model = new PessoaJuridicaModel();
        if(isset($_GET['busca'])){
            $model = $model->getByRazao($_GET['busca']);
        }else{
            $model = $model->getAll();
        }
        
        include VIEWS . 'Empresa/ListaEmpresas.php';
    }

    public static function buscar(){
        parent::isAuthenticated();
        $model = new PessoaJuridicaModel();
        if(isset($_GET['query'])){
            $model = $model->getByRazao($_GET['query']);
        }

       parent::render("Empresa/ListaEmpresas", $model);
    }

}
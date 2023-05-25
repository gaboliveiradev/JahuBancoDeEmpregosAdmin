<?php

namespace App\Controller;

use App\Model\PessoaFisicaModel;
use App\Model\PessoaJuridicaModel;
use App\Model\VagaModel;

class DashboardController extends Controller {

    public static function index() {
        parent::isAuthenticated();

        $model = new PessoaFisicaModel();
        $pessoa_por_sexo = $model->pessoasPorSexo();
        $curriculos_por_bairro = $model->curriculosPorBairro();
        $idade_por_bairro = $model->idadePorBairro();
        $idade_por_sexo = $model->idadePorSexo();

        $model = new PessoaJuridicaModel();
        $empresas_por_bairro = $model->empresasPorBairro();
        $vagas_por_bairro = $model->vagasPorBairro();

        $model = new VagaModel();
        $vagas_por_setor = $model->vagasPorSetor();
        $salario_por_setor = $model->salarioPorSetor();


        include './../App/View/modules/Dashboard/MenuInicial.php';
    }
}
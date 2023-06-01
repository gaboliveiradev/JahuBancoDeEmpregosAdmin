<?php

use App\Controller\{
    CurriculoController,
    DashboardController,
    PessoaJuridicaController,
    LoginController,
    PessoaFisicaController,
    QualificacaoController,
    VagaController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//var_dump($parse_uri);

switch ($parse_uri) {

        // Rotas Login
    case "/login":
        LoginController::index();
        break;

    case "/logout":
        LoginController::logout();
        break;

    case "/login/auth":
        LoginController::auth();
        break;

        // Rotas Dashboard

    case "/dashboard":
        DashboardController::index();
        break;

    case "/pessoas/listar":
        PessoaFisicaController::index();
        break;

    case "/pessoas/busca":
        PessoaFisicaController::buscar();
        break;

    case "/vagas/listar":
        VagaController::index();
        break;

    case "/vagas/busca":
        VagaController::buscar();
        break;

    case "/curriculo":
        CurriculoController::index();
        break;

    case "/empresas/listar":
        PessoaJuridicaController::index();
        break;

    case "/empresas/busca":
        PessoaJuridicaController::buscar();
        break;

    case "/vaga-de-emprego":
        //VagaController::index();
        break;

        // Query's

    case '/curriculo/by-bairro':
        PessoaFisicaController::curriculosByBairro();
        break;

    case '/idade/by-sexo':
        PessoaFisicaController::idadeBySexo();
        break;
    case '/pessoa/by-sexo':
        PessoaFisicaController::pessoasBySexo();
        break;

    case '/salario/by-setor':
        VagaController::salarioPorSetor();
        break;
    case '/vaga/by-setor':
        VagaController::vagasPorSetor();
        break;

    case '/vaga/by-bairro':
        VagaController::vagasPorBairro();
        break;


    case '/empresa/by-bairro':
        PessoaJuridicaController::empresasByBairro();

    case '/idade/by-bairro':
        PessoaFisicaController::idadeByBairro();
        break;

    case "/get/empresa":
        PessoaJuridicaController::getById();
        break;

    case "/get/pf":
        PessoaFisicaController::getById();
        break;

    case "/get/qualificacao":
        QualificacaoController::getById();
        break;

    case "/get/vaga":
        VagaController::getById();
        break;

    default:
        header("Location: /login");
        break;
}

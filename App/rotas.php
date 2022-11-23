<?php
use App\Controller\{
    CurriculoController,
    DashboardController,
    EmpresaController,
    LoginController,
    VagaEmpregoController,
    PessoaFisicaController
};

$parse_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($parse_uri) {

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

    case "/curriculo":
        CurriculoController::index();
    break;

    case "/empresas/listar":
        EmpresaController::index();
    break;

    case "/empresas/busca":
        EmpresaController::buscar();
    break;

    case "/vaga-de-emprego":
        //VagaController::index();
    break;

    default:
        header("Location: /login");
    break;
}

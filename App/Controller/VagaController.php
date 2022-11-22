<?php

namespace App\Controller;

class VagaController extends Controller {

    public static function index() {
        parent::isAuthenticated();
        parent::render("Vaga/ListaVaga");
    }
}
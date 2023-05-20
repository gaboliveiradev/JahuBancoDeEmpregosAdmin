<?php
namespace App\Controller;

abstract class Controller {
    protected static function render($view, $model = null) {
        $arquivo = VIEWS . "$view.php";

        if(file_exists($arquivo))
            include  $arquivo;
        else
            echo "arquivo não encontrado. Caminho: " . $arquivo;
    }

    protected static function isAuthenticated() {
        if(!isset($_SESSION['admin_logged']))
            header("Location: /login");
    }

    protected static function setResponseAsJSON($data, $request_status = true)
    {
        header("Access-Control-Allow-Origin: *");  
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');      
        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");      
        
        exit(json_encode($data));
    }
}

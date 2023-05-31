<?php
    define('BASEDIR', dirname(__FILE__, 2));
    define('VIEWS', BASEDIR . '/App/View/Modules/');

/**
 * Configurações do Ambiente de Desenvolvimento
 */
if(str_contains($_SERVER['HTTP_HOST'], 'localhost'))
{
    $_ENV['db']['host'] = 'localhost:3306';
    $_ENV['db']['user'] = 'root';
    $_ENV['db']['pass'] = 'cajuru@2022';
    $_ENV['db']['dbname'] = 'metodaco_banco_empregos';

    error_reporting(~ E_ALL);
    ini_set('log_errors', 'On');

} else {

    /**
     * Configurações do Ambiente de PRODUÇÃO
     */
    $_ENV['db']['host'] = 'localhost';
    $_ENV['db']['user'] = 'ftp7702e_prod'; // Esse usuário tem apenas os privilégios de SELECT e UPDATE
    $_ENV['db']['pass'] = 'aFYcnftTdgYK';
    $_ENV['db']['dbname'] = 'ftp7702e_emprega';

    /**
     * Antigo
     */
    //$_ENV['db']['host'] = 'localhost';
    //$_ENV['db']['user'] = 'empregajaucom_db'; // Esse usuário tem apenas os privilégios de SELECT e UPDATE
    //$_ENV['db']['pass'] = 'U&+aQMn_6jn^';
    //$_ENV['db']['dbname'] = 'empregajaucom_db';
}

/*$_ENV['db']['host'] = 'localhost:3306';
$_ENV['db']['user'] = 'empregajaucom_db';
$_ENV['db']['pass'] = 'U&+aQMn_6jn^';
$_ENV['db']['dbname'] = 'empregajaucom_db';*/

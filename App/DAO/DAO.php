<?php
namespace App\DAO;

use \PDO;

abstract class DAO {

    protected $conexao;

    /**
     * Parâmetros de configuração da classe PDO.
     * 1) Definindo o modo de erro como exceções, para capturar PDOException
     * 2) Definindo o encoding das consultas como utf8 e tentando determinadar a timezone como Brasília
     * 3) Deixando a conexão persistente para armazenar na propriedade estática como conexão aberta.
     */
    private static $options = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET time_zone="-03:00", NAMES utf8; ',
        PDO::ATTR_PERSISTENT => true // https://stackoverflow.com/questions/23432948/fully-understanding-pdo-attr-persistent
	);

    public function __construct() {
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['dbname'];
        $this->conexao = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass'], self::$options);
    }
}

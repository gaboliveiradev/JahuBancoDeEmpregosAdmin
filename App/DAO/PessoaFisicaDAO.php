<?php

namespace App\DAO;

use App\Model\PessoaFisicaModel;
use \PDO;

class PessoaFisicaDAO extends PessoaDAO {

    public $conexao;
    public function __construct()
    {
        parent::__construct();  
    } 

    
}
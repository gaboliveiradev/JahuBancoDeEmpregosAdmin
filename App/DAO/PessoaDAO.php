<?php

namespace App\DAO;

use App\Model\PessoaModel;
use \PDO;

class PessoaDAO extends DAO {

    public $conexao;
    public function __construct()
    {
        parent::__construct();  
    } 

    
}
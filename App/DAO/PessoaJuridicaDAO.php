<?php

namespace App\DAO;

use App\Model\PessoaJuridicaModel;
use \PDO;

class PessoaJuridicaDAO extends PessoaDAO {

    public $conexao;
    public function __construct()
    {
        parent::__construct();  
    } 

    
}
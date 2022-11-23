<?php

namespace App\DAO;

use App\Model\VagaModel;
use \PDO;

class VagaDAO extends DAO {

    public $conexao;
    public function __construct()
    {
        parent::__construct();  
    } 

    
}
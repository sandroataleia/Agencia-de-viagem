<?php

namespace App\Models;

use CodeIgniter\Model;

class ContaModel extends Model
{
    protected $table            = 'contas';
    protected $primaryKey       = 'id_conta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['numero_conta','fk_agencia','saldo_inicial','saldo_atual','fk_tipoconta','status','cheque_especial'];
}
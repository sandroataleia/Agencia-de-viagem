<?php

namespace App\Models;

use CodeIgniter\Model;

class CpagarModel extends Model
{
    protected $table            = 'titulo_pagar';
    protected $primaryKey       = 'id_cpagar';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'fk_fornecedor',
                                    'nome',
                                    'fk_usuario',
                                    'dt_vencimento',
                                    'obs',
                                    'situacao',
                                    'dt_pagamento',
                                    'valor'
                                  ];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfilModel extends Model
{
    protected $table            = 'movimentacao_financeira';
    protected $primaryKey       = 'id_movimentacao';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tipo','fk_conta','valor','fk_forma_pagamento','fk_banco','conciliado','fk_fornecedor_cliente'];
}
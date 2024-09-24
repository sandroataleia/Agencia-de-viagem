<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimentacaoFinanceiraModel extends Model
{
    protected $table            = 'movimentacao_financeira';
    protected $primaryKey       = 'id_movimentacao';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tipo','numero_conta','valor','fpagamento','banco','conciliado','cliente_fornecedor','entrada_saida'];
}
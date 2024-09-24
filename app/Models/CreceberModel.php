<?php

namespace App\Models;

use CodeIgniter\Model;

class CreceberModel extends Model
{
    protected $table            = 'titulo_receber';
    protected $primaryKey       = 'id_creceber';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'cpf',
                                    'fk_usuario',
                                    'data_vencimento',
                                    'data_lancamento',
                                    'situacao',
                                    'data_pagamento',
                                    'valor_pago',
                                    'valor_aberto',
                                    'fk_venda',
                                    'valor_original',
                                    'fk_fpagamento',
                                  ];
}
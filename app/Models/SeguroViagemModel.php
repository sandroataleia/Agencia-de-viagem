<?php

namespace App\Models;

use CodeIgniter\Model;

class SeguroViagemModel extends Model
{
    protected $table            = 'seguro_viagem';
    protected $primaryKey       = 'id_seguro_viagem';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'situacao',
                                    'cpf',
                                    'data_vigencia_inicio',
                                    'data_vigencia_fim',
                                    'seguradora',
                                    'fk_venda',
                                    'obs',
                                    'valor',
                                    'fk_parceiro'
                                  ];
}
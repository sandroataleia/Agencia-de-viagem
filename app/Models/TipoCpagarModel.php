<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoCpagarModel extends Model
{
    protected $table            = 'tipo_conta_pagar';
    protected $primaryKey       = 'id_tipo_pagar';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['descricao'];
}
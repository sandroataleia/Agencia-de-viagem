<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoContaModel extends Model
{
    protected $table            = 'tipo_contas';
    protected $primaryKey       = 'id_tipo_conta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['descricao_tipo','status'];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class AgenciaModel extends Model
{
    protected $table            = 'agencias';
    protected $primaryKey       = 'id_agencia';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['agencia','fk_banco','contato'];
}

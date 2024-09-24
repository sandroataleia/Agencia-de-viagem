<?php

namespace App\Models;

use CodeIgniter\Model;

class EntradasSaidasModel extends Model
{
    protected $table            = 'titulo_pagar';
    protected $primaryKey       = 'id_entradas_saidas';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['valor','fk_fornecedor','tipo','fk_fpagamento','descricao','fk_conta'];
}
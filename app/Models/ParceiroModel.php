<?php

namespace App\Models;

use CodeIgniter\Model;

class ParceiroModel extends Model
{
    protected $table            = 'parceiros';
    protected $primaryKey       = 'id_parceiros';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cpf','nome_parceiro'];
}
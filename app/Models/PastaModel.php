<?php

namespace App\Models;

use CodeIgniter\Model;

class PastaModel extends Model
{
    protected $table            = 'pastas';
    protected $primaryKey       = 'id_pasta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cpf','descricao_pasta'];

}
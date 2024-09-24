<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model
{
    protected $table            = 'empresa';
    protected $primaryKey       = 'id_empresa';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['razao_social','fantasia','cnpj','inscricao_estadual','inscricao_estadual','logo'];
}
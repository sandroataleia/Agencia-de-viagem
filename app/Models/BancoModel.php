<?php

namespace App\Models;

use CodeIgniter\Model;

class BancoModel extends Model
{
    protected $table            = 'bancos';
    protected $primaryKey       = 'id_banco';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome','codigo','status'];
}
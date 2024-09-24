<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfilUsuarioModel extends Model
{
    protected $table            = 'perfil_usuario';
    protected $primaryKey       = 'id_perfil_usuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fk_perfil','fk_usuario'];
}
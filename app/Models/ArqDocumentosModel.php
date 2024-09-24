<?php

namespace App\Models;

use CodeIgniter\Model;

class ArqDocumentosModel extends Model
{
    protected $table            = 'arq_documentos';
    protected $primaryKey       = 'id_arqdocumentos';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['filename','fk_pasta','descricao_arquivo'];
}
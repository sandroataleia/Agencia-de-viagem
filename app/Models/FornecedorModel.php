<?php

namespace App\Models;

use CodeIgniter\Model;

class FornecedorModel extends Model
{
    protected $table            = 'fornecedor';
    protected $primaryKey       = 'id_fornecedor';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['status','fk_filial','usu_cadastro','cpf_cnpj','fantasia','tipo_fornecedor','inscricao_estadual','inscricao_municipal'];
}
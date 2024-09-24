<?php

namespace App\Models;

use CodeIgniter\Model;

class FormaPagamentoModel extends Model
{
    protected $table            = 'fpagamentos';
    protected $primaryKey       = 'id_fpagamento';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'parcelas',
                                    'descricao_fpagamento',
                                    'status',
                                    'tempo_pagamento'
                                  ];

   
    public function getRows(){
        return $this->findAll();
    }

    public function addRow($data){
        $data['status']  = 1;
        $this->save($data);
        return true;
    }

    public function verificaExiste($forma){
        $this->where('forma',$forma);
        $result = $this->get();
        return $result->getResult();
    }
}
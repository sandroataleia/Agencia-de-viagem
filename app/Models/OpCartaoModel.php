<?php

namespace App\Models;

use CodeIgniter\Model;

class OpCartaoModel extends Model
{
    protected $table            = 'operadora_cartoes';
    protected $primaryKey       = 'id_operadora';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['operadora','dias_repasse','cnpj','dias_prepasse','nome_cliente_operadora','endereco','numero','bairro','cidade','cep','pais', 'estado','status'];

   
    public function getRows(){
        return $this->findAll();
    }

    public function addRow($data){
        $this->save($data);
        return true;
    }

    public function verificaExiste($cnpj){
        $this->where('cnpj',$cnpj);
        $result = $this->get();
        return $result->getResult();
    }
}
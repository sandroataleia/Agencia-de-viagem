<?php

namespace App\Models;

use CodeIgniter\Model;

class CargoModel extends Model
{
    protected $table            = 'cargos';
    protected $primaryKey       = 'id_cargo';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cargo','descricao','status'];

   
    public function getRows(){
        return $this->findAll();
    }

    public function addRow($data){
        $this->save($data);
        return true;
    }

    public function verificaExiste($tipo){
        $this->where('cargo',$tipo);
        $result = $this->get();
        return $result->getResult();
    }
}
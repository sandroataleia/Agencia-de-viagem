<?php

namespace App\Models;

use CodeIgniter\Model;

class ConatoModel extends Model
{
    protected $table            = 'contatos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fk_pessoa','fone'];

   
    public function getRows(){
        $this->join('pessoas','pessoas.id = clientes.fk_pessoa');
        return $this->findAll();
    }

    public function addRow($data){
        model('PessoaModel')->save($data);
        $data = [
            'fk_pessoa' => $this->db->insertId(),
            'status'    => 1,
        ];
        $this->save($data);
           
        return true;
    }

}
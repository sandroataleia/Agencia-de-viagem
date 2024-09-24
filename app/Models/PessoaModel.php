<?php

namespace App\Models;

use CodeIgniter\Model;

class PessoaModel extends Model
{
    protected $table            = 'pessoas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome','sobrenome','rg','cpf','email','dtnascimento','sexo','telefone','endereco','numero','bairro','complemento','estado','pais','cep','cidade'];

   
    public function getRows(){
        $this->join('profile','users.id_profile = profile.id');

        $result = $this->get();
        return $result->getResult();
    }

    public function verificaCpf($cpf){
        $this->where('cpf',$cpf);
        $result = $this->get();
        return $result->getResult();
    }

    public function addRow($data){
        $this->save($data);
           
        return true;
    }

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table            = 'clientes';
    protected $primaryKey       = 'id_cliente';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fk_pessoa','numero_passaporte','contato_emergencia','fone_emergencia','enderecosec','numerosec','bairrosec','cidadesec','estadosec','complementosec','paissec','cepsec','cpf','validade_passaporte','nacionalidade','fk_usuario','ultima_alteracao','data_ultima_alteracao','grau_parentesco'];

   
    public function getRows(){
        $this->join('pessoas','pessoas.cpf = clientes.cpf','left');
        return $this->findAll();
    }

    public function verificaCliente($cpf){
        $this->where('cpf',$cpf);
        $result = $this->get();
        return $result->getResult();
    }

    public function addRow($data){
        model('PessoaModel')->save($data);
        $data['fk_pessoa'] = $this->db->insertId();
        $data['status']  = 1;
        $this->save($data);
           
        return true;
    }
}
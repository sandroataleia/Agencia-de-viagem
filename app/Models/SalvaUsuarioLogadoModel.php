<?php 

namespace App\Models;

use CodeIgniter\Model;

class SalvaUsuarioLogadoModel extends Model
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        parent::__construct();
        $this -> db = \Config\Database::connect();
        $this->builder = $this->db->table('usu_logado');
    }


    public function SalvaUsuario($data)
    {
        $this->builder->insert($data);
        $id =  $this->db->insertId();
        $this->builder->where('id', $id);
        $result = $this->builder->get();
        return $result->getRowArray();
    }
}
?>
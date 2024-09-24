<?php 

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model{

    public function getUsuario($user = null, $password = null)
    {
        $db = \Config\Database::connect('sqlsrv');
        $builder = $db->table('e099usu');
        $builder->select('codusu,nomusu,usu_password,codemp');
        $builder->where('nomusu',$user);
        $builder->where('usu_password',$password);
        $builder->where('codemp',1);
        $result = $builder->get();
        return $result->getRowArray();
    }
}
?>
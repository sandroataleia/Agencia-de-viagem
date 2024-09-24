<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','user','password','profile','cpf','nome_usuario'];

    public function check($user, $password){
        $this->where('user',$user)->first();
        $buscaUsuario = $this->where('password',md5($password))->get();
        $result = $buscaUsuario->getRow(); 
        if(is_null($result)){
            return false;
        }   
        return $result;
    }
    
    public function getRows(){
        $this->join('profile','users.id_profile = profile.id');

        $result = $this->get();
        return $result->getResult();
    }

    public function ExistsUser($username){
        $result = $this->where('user',$username)->fisrt();
        if($result){
            return true;
        }else{
            return false;
        }
        
    }

}
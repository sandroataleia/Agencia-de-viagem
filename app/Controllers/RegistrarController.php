<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RegistrarController extends BaseController
{
    public function index()
    {
        $data['msg'] = '';
        if($this->request->getPost()){
            $userModel = model('UserModel');
            try{
                $userData = $this->request->getPost();
                $userData['profile'] = 'usuario';
                if($userModel->save($userData)){
                    $data['msg'] = 'Usuário cadastrado com sucesso"';
                }else{
                    $data['msg'] = 'Erro ao criar usuário!';
                    $data['errors'] = $userModel->errors();
                }
            }catch(\Exception $e){
                $data['msg'] = 'Erro ao criar usuário!' . $e->getMessage();
            }
        }
        return view('login/registrar',$data);
    }
}

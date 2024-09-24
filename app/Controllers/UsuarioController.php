<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\PerfilModel;
use App\Models\PerfilUsuarioModel;
use App\Models\UserModel;

class UsuarioController extends BaseController
{
    protected $usuarioModel;
    protected $perfilModel;
    protected $perfilUsuarioModel;

    public function __construct()
    {
        $this->usuarioModel         = new UserModel();  
        $this->perfilModel          = new PerfilModel();
        $this->perfilUsuarioModel   = new PerfilUsuarioModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'results'           => $this->usuarioModel->findAll(),
            'menu_active'       => 'usuario',
            'submenu_active'    => 'usuario',
            'title'             => "Lista de usuários",
        ];
        return view('usuario/index',$data);
    }

    public function formulario_cadastro()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'usuario',
            'submenu_active'    => 'usuario',
            'title'             => "Usuários",
            'perfis'            => $this->perfilModel->findAll(),
        ];
        return view('usuario/adicionar',$data);
    }

    public function adicionar()
    {
        if($this->usuarioModel->where('cpf',$this->request->getPost('cpf'))->first()){
            return redirect()->back()->with('warning','CPF já cadastrado no sistema.');
        }elseif($this->usuarioModel->where('user',$this->request->getPost('user'))->first()){
            return redirect()->back()->with('warning','Usuário já cadastrado no sistema.');
        }else{
            

            $data = [
                'user'          => $this->request->getPost('user'),
                'password'      => md5($this->request->getPost('password')),
                'cpf'           => $this->request->getPost('cpf'),
                'nome_usuario'  => $this->request->getPost('nome_usuario'),
            ];
            $this->usuarioModel->save($data);
            return redirect()->back()->with('success','Cadastro efetuado com sucesso!');
        }  
    }

    public function formulario_edicao($id)
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'usuario',
            'submenu_active'    => 'usuario',
            'title'             => "Usuários",
            'result'            => $this->usuarioModel->find($id),
        ];
        return view('usuario/editar',$data);
    }

    public function alterar(){

        if($this->request->getPost()){
            $password = $this->request->getPost('password');
        }else{
            $password = '123';
        }
        $pass = md5($password);
        $this->usuarioModel->where('cpf',$this->request->getPost('cpf'))
                            ->set('password',$pass)
                            ->update();
             
            return redirect()->back()->with('success','Senha alterada com sucesso!');
        
    }

    public function excluir($id){
        $this->usuarioModel->where('id_usuario',$id)
                            ->delete();

        return redirect()->back()->with('success','Exclusão efetuada com sucesso!');                   
    }

    public function perfil($id){
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'usuario',
            'submenu_active'    => '',
            'title'             => "Usuários",
            'id_usuario'        => $id,
            'usuario'           => $this->usuarioModel->find($id),
            'results'           => $this->perfilModel->select('fk_perfil,id_perfil,perfil,descricao,id_perfil_usuario')
                                                        ->join('perfil_usuario','id_perfil = fk_perfil and fk_usuario = '.$id,'left')
                                                        ->findAll(),
        ];
    return view('usuario/perfil',$data);
    }

    public function inserirPerfil(){
        $this->perfilUsuarioModel->save($this->request->getPost());
        //return $this->request->getPost('fk_perfil');
    }

    public function excluirPerfil(){
        $this->perfilUsuarioModel->where('id_perfil_usuario',$this->request->getPost('id_perfil_usuario'));
        $this->perfilUsuarioModel->delete();
        //return $this->request->getPost('fk_perfil');
    }
}

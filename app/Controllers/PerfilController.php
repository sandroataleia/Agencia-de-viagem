<?php

namespace App\Controllers;

use App\Models\EmpresaModel;
use App\Models\PerfilModel;


class PerfilController extends BaseController
{   
    protected $perfilModel;

    public function __construct()
    {
        $this->perfilModel     = new PerfilModel();

    }
    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'usuario',
            'submenu_active'    => 'perfil',
            'title'             => 'Perfil de usuário',
            'results'           => $this->perfilModel->findAll()
        ];

        return view('perfil/index',$data);    
    }

    public function formulario_cadastro(){
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'usuario',
            'submenu_active'    => 'perfil',
            'title'             => 'Perfil de usuário',
            'results'           => $this->perfilModel->findAll()
        ];

        return view('perfil/adicionar',$data);
    }

    public function adicionar(){
        
        if($this->perfilModel->where('perfil',$this->request->getPost('perfil'))->first()){

            return redirect()->back()->with('warning', 'Perfil já cadastrado!');
        }
        else{
           
            $this->perfilModel->save($this->request->getPost());
          
            return redirect()->back()->with('success', 'Cadastro efetuado com sucesso!');
        }
    }
  
    public function formulario_edicao($id)
    {   
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'usuario',
            'submenu_active'    => 'perfil',
            'title'             => 'Editar de perfil',
            'result'            => $this->perfilModel->find($id)
        ];
        return view('perfil/editar',$data);    

    }

    public function alterar(){
        $this->perfilModel->where('id_perfil',$this->request->getPost('id_perfil'));
        $this->perfilModel->set($this->request->getPost());
        $this->perfilModel->update();

        return redirect()->back()->with('success','Registro alterado com sucesso!');
    }

    public function excluir($id)
    {
        $this->perfilModel->where('id_perfil',$id);
        
        if($this->perfilModel->delete()):
            return redirect()->back()->with('success','Registro excluído com sucesso!');
        else:
            return redirect()->back()->with('error','Houve um erro eu tentar excluir este registro!');
        endif;
    }
}

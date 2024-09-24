<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\EmpresaModel;

class CategoriaController extends BaseController
{   
    protected $categoriamodel;

    public function __construct()
    {
        $this->categoriamodel = new CategoriaModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'results'       => $this->categoriamodel->findAll(),
        ];
       
        return view('categoria/index',$data);    
    }

    public function formulariodecadastro()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'results'       => $this->categoriamodel->findAll(),
        ];
       
        return view('categoria/adicionar',$data);    
    }

    public function adicionar()
    {
        $this->categoriamodel->save($this->request->getPost());

        return redirect()->back()->with('success','Cadastro efetuado com sucesso!');
    }

    public function formulariodeedicao($id)
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'result'       => $this->categoriamodel->find($id),
        ];
       
        return view('categoria/alterar',$data);    
    }

    public function editar($id)
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'result'       => $this->categoriamodel->find($id),
        ];
       
        return view('categoria/alterar',$data);    
    }

    public function alterar()
    {
        $this->categoriamodel->where('id_categoria',$this->request->getPost('id_categoria'))
                            ->set($this->request->getPost())
                            ->update();

        return redirect()->back()->with('success','Alteração efetuada com sucesso!');
    }

    public function excluir($id)
    {
        $this->categoriamodel->where('id_categoria',$id);
        $this->categoriamodel->delete();

        return redirect()->back()->with('success','Excluído com sucesso!');
    }
}

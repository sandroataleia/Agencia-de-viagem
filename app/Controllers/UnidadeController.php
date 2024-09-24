<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\UnidadeModel;

class UnidadeController extends BaseController
{   
    protected $unidademodel;

    public function __construct()
    {
        $this->unidademodel = new UnidadeModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'results'       => $this->unidademodel->findAll(),
        ];
       
        return view('unidade/index',$data);    
    }

    public function formulariodecadastro()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'results'       => $this->unidademodel->findAll(),
        ];
       
        return view('unidade/adicionar',$data);    
    }

    public function adicionar()
    {
        $this->unidademodel->save($this->request->getPost());

        return redirect()->back()->with('success','Cadastro efetuado com sucesso!');
    }

    public function formulariodeedicao($id)
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'result'       => $this->unidademodel->find($id),
        ];
       
        return view('unidade/alterar',$data);    
    }

    public function editar($id)
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'result'       => $this->unidademodel->find($id),
        ];
       
        return view('unidade/alterar',$data);    
    }

    public function alterar()
    {
        $this->unidademodel->where('id_unidade',$this->request->getPost('id_unidade'))
                            ->set($this->request->getPost())
                            ->update();

        return redirect()->back()->with('success','Alteração efetuada com sucesso!');
    }

    public function excluir($id)
    {
        $this->unidademodel->where('id_unidade',$id);
        $this->unidademodel->delete();

        return redirect()->back()->with('success','Excluído com sucesso!');
    }
}

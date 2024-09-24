<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\FormaPagamentoModel;
use App\Models\OpCartaoModel;

class FormaPagamentoController extends BaseController
{   
    protected $mFPagamento;
    protected $mOpCartoes;

    public function __construct()
    {
        $this->mFPagamento = new FormaPagamentoModel();
        $this->mOpCartoes = new OpCartaoModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'fpagamento',
            'title'             => "Foma de pagamento",
            'operadoras'        => $this->mOpCartoes->getRows(),
            'results'           => $this->mFPagamento->paginate(10),
            'pages'             => $this->mFPagamento->pager,
        ];

        return view('fpagamento/index',$data);    
    }

    public function formCad(){
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'fpagamento',
            'title'             => "Foma de pagamento",
        ];
        return view('fpagamento/adicionar',$data);
    }

    public function adicionar(){
        $this->mFPagamento->save($this->request->getPost());
        return redirect()->back()->with('success','Cadastro efetuado com sucesso!');  
    }

    public function editar($id)
    {   
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'fpagamento',
            'title'             => "Foma de pagamento",
            'operadoras'        => $this->mOpCartoes->getRows(),
            'results'           => $this->mFPagamento->getRows(),
        ];

        return view('fpagamento/editar',$data);    

    }

    public function update(){
        $this->mFPagamento->where('id_fpagamento',$this->request->getPost('id_fpagamento'));
        $this->mFPagamento->set($this->request->getPost());
        $this->mFPagamento->update();

        return redirect()->back()->with('success','Alteração efetuada com sucesso!');
    }

    public function excluir($id)
    {
        $this->mFPagamento->where('id_fpagamento',$id);
        $this->mFPagamento->delete();

        return redirect()->back()->with('success','Excluído com sucesso!');
    }
}

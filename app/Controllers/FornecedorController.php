<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\FornecedorModel;

class FornecedorController extends BaseController
{   
    protected $fornecedorModel;

    public function __construct()
    {
        $this->fornecedorModel     = new FornecedorModel();

    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'title'             => 'Fornecedor',
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'fornecedor',
            'results'           => $this->fornecedorModel->findAll(),
        ];

        return view('fornecedor/index',$data);    
    }

   

    public function adicionar(){
            $this->fornecedorModel->save($this->request->getPost());
            return redirect()->back()->with('success', 'Cadastro efetuado com sucesso!');
    } 

    public function excluir($id)
    {
        $this->fornecedorModel->where('id_fornecedor',$id)->delete();

        return redirect()->back()->with('success','Funcionário excluído com sucesso!');
    }
}

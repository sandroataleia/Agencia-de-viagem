<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgenciaModel;
use App\Models\BancoModel;
use App\Models\EmpresaModel;

class AgenciaController extends BaseController
{   
    protected $agenciamodel;
    protected $bancomodel;

    public function __construct()
    {
        $this->agenciamodel = new AgenciaModel();
        $this->bancomodel = new BancoModel();
    }

    public function index()
    {
        $result = array();
        $result = $this->agenciamodel->join('bancos','id_banco = fk_banco','left')
                                        ->findAll();

        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'agencia',
            'title'             => "Agência",
            'results'           => $result,
            'bancos'            => $this->bancomodel->findAll(),
        ];
       
        return view('agencia/index',$data);    
    }

    public function adicionar()
    {
        $this->agenciamodel->save($this->request->getPost());

        return redirect()->back()->with('success','Cadastro efetuado com sucesso!');
    }

    public function excluir($id)
    {
        $this->agenciamodel->where('id_agencia',$id);
        $this->agenciamodel->delete();

        return redirect()->back()->with('success','Agencia excluída com sucesso!');
    }
}

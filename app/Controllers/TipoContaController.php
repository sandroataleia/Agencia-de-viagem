<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\TipoContaModel;

class TipoContaController extends BaseController
{   
    protected $tipomodel;


    public function __construct()
    {
        $this->tipomodel = new TipoContaModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'financeiro',
            'title'         => "Tipos de conta",
            'results'       => $this->tipomodel->findAll(),
        ];
       
        return view('tipoconta/index',$data);    
    }

    public function adicionar()
    {
        $this->tipomodel->save($this->request->getPost());

        return redirect()->back()->with('success','Cadastro efetuado com sucesso!');
    }

    public function excluir($id)
    {
        $this->tipomodel->where('id_tipo_conta',$id);
        $this->tipomodel->delete();

        return redirect()->back()->with('success','Tipo conta excluída com sucesso!');
    }
}

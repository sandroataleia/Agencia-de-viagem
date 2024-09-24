<?php

namespace App\Controllers;


use App\Models\TViagemModel;
use App\Controllers\BaseController;
use App\Models\EmpresaModel;

class TViagemController extends BaseController
{   
    protected $mtViagem;

    public function __construct()
    {
        $this->mtViagem = new TViagemModel();
    }
    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'viagem',
            'title'             => "Tipo viagem",
            'results'           => $this->mtViagem->getRows(),
        ];

        return view('tviagem/index',$data);    
    }

    public function form_cadastro(){
        
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'       => $empresa->first(),
            'title'         => 'Cadastrar tipo de viagem',
            'menu_active'   => 'viagem',
        ];

        return view('tviagem/adicionar',$data);
    }

    public function adicionar(){

        $result = $this->mtViagem->verificaExiste($this->request->getPost('tipo'));
    
        if($result){
            return $this->response->setJson(['error']);
        }else{
            $this->mtViagem->addRow($this->request->getPost());

            return $this->response->setJson(['sucesso']);
        }
        
    }

    public function editar($id)
    {   
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'       => $empresa->first(),
            'result'        => $this->mtViagem->where('id_tviagem',$id)->get()->getRow(),
            'menu_active'   => 'viagem',
            'title'         => "Alterar Tipo de Viagem",
        ];

        return view('tviagem/editar',$data);    

    }

    public function update(){
        $id = $this->request->getPost('id');

        $this->mtViagem->where('id_tviagem',$id);
        $this->mtViagem->set($this->request->getPost());
        $this->mtViagem->update();

        return redirect()->back();
    }

    public function excluir($id)
    {
        $this->mtViagem->where('id_tviagem',$id);
        $this->mtViagem->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OpCartaoModel;

class OpCartoesController extends BaseController
{   
    protected $mOpCartao;

    public function __construct()
    {
        $this->mOpCartao = new OpCartaoModel();;
    }
    public function index()
    {
        $data['menu_active'] = 'financeiro';
        $data['title']      = "Operadoras de cartão";
        $data['results']   = $this->mOpCartao->getRows();
        return view('OpCartao/index',$data);    
    }

    public function formCad(){
        $data['title'] = 'Cadastrar Forma de pagamento';
        $data['menu_active'] = 'financeiro';
        return view('OpCartao/adicionar',$data);
    }

    public function adicionar(){
        $result = $this->mOpCartao->where('cnpj',$this->request->getPost('cnpj'))
                                    ->first();
    
        if($result){
            return redirect()->back()->with('warning','Operadora ja cadastrada.');
        }else{
            $this->mOpCartao->addRow($this->request->getPost());

            return redirect()->back()->with('success','Cadastro efetuado com sucesso!.');
        }
        
    }

    public function editar($id)
    {   
        $data['result'] = $this->mOpCartao->find($id);
                                        
        $data['menu_active'] = 'financeiro';
        $data['title']      = "Operadoras de cartão";
        return view('OpCartao/editar',$data);    

    }

    public function update(){

        $this->mOpCartao->where('id_operadora',$this->request->getPost('id_operadora'));
        $this->mOpCartao->set($this->request->getPost());
        $this->mOpCartao->update();

        return redirect()->back()->with('success','Alteração efetuada com sucesso!');
    }

    public function excluir($id)
    {
        $this->mOpCartao->where('id_operadora',$id);
        $this->mOpCartao->delete();

        return redirect()->back()->with('success','Opeadora excluída com sucesso!');
    }
}

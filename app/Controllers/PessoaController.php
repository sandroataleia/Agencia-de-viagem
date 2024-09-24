<?php

namespace App\Controllers;

use App\Models\PessoaModel;
use App\Controllers\BaseController;
use App\Models\EmpresaModel;

class PessoaController extends BaseController
{   
    protected $mPessoa;

    public function __construct()
    {
        $this->mPessoa = new PessoaModel();
    }
    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'          => $empresa->first(),
            'menu_active'      => 'pessoa',
            'title'            => "Pessoas",
            'results'          => model('PessoaModel')->findAll(),
        ];
        
        return view('pessoa/index',$data);    
    }

    public function form_cadastro(){
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'title'             => 'Cadastrar Pessoa',
            'menu_active'       => 'pessoa',
        ];
        return view('pessoa/adicionar',$data);
    }

    public function verificaCadastro($cpf){
        if(model('PessoaModel')->verificaCpf($cpf)){
            return "true";
        }else{
            return 'false';
        }
    }

    public function buscar($id){
        $result = $this->mPessoa->find($id);
        return json_encode($result);
    }

    public function adicionar(){
        $result = $this->mPessoa->addRow($this->request->getPost());
        if($result){
            return redirect()->back()->with('message','Cadastro efetuado com sucesso!');
        } 
    }

    public function update(){
        $this->mPessoa->where('id',$this->request->getPost('id'));
        $this->mPessoa->set($this->request->getPost());
        $result = $this->mPessoa->update();

        if($result){
            return redirect()->back()->with('message','Editado com sucesso!');
        }
    }

    public function autocomplete($nome){
        $results = $this->mPessoa->like('nome',$nome)
                      ->get()
                      ->getResult();
        $data = [];
       foreach($results as $result){
            $data = array(
                'nome'  => $result->nome,
                'id'    => $result->id
            );
       }
       return json_encode($data);
    }

    public function excluir($id)
    {
        $this->mPessoa->where('id',$id);
        $this->mPessoa->delete();
        return redirect()->back();
    }

}
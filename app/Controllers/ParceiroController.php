<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\ParceiroModel;
use App\Models\PessoaModel;

class ParceiroController extends BaseController
{   
    protected $parceiroModel;
    protected $pessoaModel;
    protected $empresaModel;

    public function __construct()
    {
        $this->parceiroModel  = new ParceiroModel();
        $this->pessoaModel    = new PessoaModel();
        $this->empresaModel   = new EmpresaModel();
    }

    public function index()
    {                             
      $data = [
        'empresa'           => $this->empresaModel->first(),
        'menu_active'       => 'cadastro',
        'submenu_active'    => 'parceiro',
        'title'             => "Parceiro",
        'results'           => $this->parceiroModel->join('pessoas','pessoas.cpf=parceiros.cpf','left')
                                                    ->findall(),
      ];

        return view('parceiro/index',$data);    
    }

    public function formulario_cadastro(){                              
        $data = [
            'empresa'           => $this->empresaModel->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'parceiro',
            'title'             => "Parceiro",
        ];
        return view('parceiro/adicionar',$data);
    }

    public function adicionar(){
      if($this->pessoaModel->where('cpf',$this->request->getPost('cpf'))->first() && $this->parceiroModel->where('cpf',$this->request->getPost('cpf'))->first()):
        return redirect()->back()->with('warning', 'Parceiro já cadastrado!');

    elseif($this->pessoaModel->where('cpf',$this->request->getPost('cpf'))->first() && !$this->parceiroModel->where('cpf',$this->request->getPost('cpf'))->first()):
      $data = [
        'nome_parceiro'       => $this->request->getPost('nome'),
        'cpf'       => $this->request->getPost('cpf')
      ];
      $this->parceiroModel->save($data);
      return redirect()->back()->with('success', "Cadastro Efetuado com sucesso!");

    else:
      $data = [
        'nome_parceiro'       => $this->request->getPost('nome'),
        'cpf'                 => $this->request->getPost('cpf')
      ];
      $this->pessoaModel->save($this->request->getPost());
      $this->parceiroModel->save($data);
      
      return redirect()->back()->with('success', "Cadastro Efetuado com sucesso!");

    endif;
    }

  


    public function excluir($id)
    {
        $this->parceiroModel->where('id_parceiros',$id);
        $this->parceiroModel->delete();

        return redirect()->back()->with('success','Excluído com sucesso!');
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FuncionarioModel;
use App\Models\PessoaModel;
use App\Models\CargoModel;
use App\Models\EmpresaModel;
use App\Models\UserModel;

class FuncionarioController extends BaseController
{   
    protected $mFuncionario;
    protected $mPessoa;
    protected $mUsuario;
    protected $mCargo;

    public function __construct()
    {
        $this->mFuncionario     = new FuncionarioModel();
        $this->mPessoa          = new PessoaModel();
        $this->mUsuario         = new UserModel();
        $this->mCargo           = new CargoModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'         => $empresa->first(),
            'title'           => 'Funcionários',
            'menu_active'     => 'cadastro',
            'submenu_active'  => 'funcionario',
            'results'         => $this->mFuncionario->join('cargos','id_cargo=fk_cargo','left')
                                                    ->join('pessoas','pessoas.cpf=funcionarios.cpf','left')
                                                    ->findALl(),
        ];

        return view('funcionario/index',$data);    
    }

    public function formulario_cadastro(){
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'         => $empresa->first(),
            'title'           => 'Funcionários',
            'menu_active'     => 'funcionario',
            'submenu_active'  => 'funcionario',
            'cargos'          => $this->mCargo->findAll(),
        ];
        return view('funcionario/adicionar', $data);
    }

    public function adicionar(){
        if($this->mPessoa->where('cpf',$this->request->getPost('cpf'))->first() && $this->mFuncionario->where('cpf',$this->request->getPost('cpf'))->first()):
            return redirect()->back()->with('warning', 'Funcionário já cadastrado!');

        elseif($this->mPessoa->where('cpf',$this->request->getPost('cpf'))->first() && !$this->mFuncionario->where('cpf',$this->request->getPost('cpf'))->first()):
            $this->mFuncionario->save($this->request->getPost());
            return redirect()->back()->with('success', "Cadastro Efetuado com sucesso!");

        else:

            $this->mPessoa->save($this->request->getPost());
            $this->mFuncionario->save($this->request->getPost());
            
            return redirect()->route('funcionario')->with('success', "Cadastro Efetuado com sucesso!");

        endif;
        
    }

    public function editar($cpf)
    {   
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'result'            => $this->mFuncionario->where('funcionarios.cpf',$cpf)
                                                        ->join('pessoas','pessoas.cpf = funcionarios.cpf','left')
                                                        ->get()
                                                        ->getRow(),
            'submenu_active'    => 'funcionario',
            'cargos'            => $this->mCargo-> get()->getResult(),                  
            'menu_active'       => 'cadastro',
            'title'             => "Editar funcionário",
        ];

        return view('funcionario/editar',$data);    
    }

    public function update(){
        if($this->request->getPost()){
            $this->mFuncionario->where('cpf',$this->request->getPost('old_cpf'));
            $this->mFuncionario->set($this->request->getPost());
            $this->mFuncionario->update();

            $this->mPessoa->where('cpf',$this->request->getPost('old_cpf'));
            $this->mPessoa->set($this->request->getPost());
            $this->mPessoa->update();
          
            return redirect()->route('funcionario')->with('success','Alteração efetuada com sucesso!');
        }else{
            return redirect()->route('funcionario')->with('error','Ops! algo saiu errado.');
        }
    }

    public function excluir($id)
    {
        $this->mFuncionario->where('id_funcionario',$id);
        $this->mFuncionario->delete();

        return redirect()->back()->with('success','Funcionário excluído com sucesso!');
    }
}

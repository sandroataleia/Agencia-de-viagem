<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgenciaModel;
use App\Models\BancoModel;
use App\Models\TipoContaModel;
use App\Models\ContaModel;
use App\Models\EmpresaModel;

class ContaController extends BaseController
{   
    protected $tcontamodel;
    protected $bancomodel;
    protected $agenciamodel;
    protected $contamodel;

    public function __construct()
    {
        $this->tcontamodel  = new TipoContaModel();
        $this->agenciamodel = new AgenciaModel();
        $this->bancomodel   = new BancoModel();
        $this->contamodel   = new ContaModel();
    }

    public function index()
    {
        $result = array();

        $result = $this->contamodel->join('agencias','id_agencia = fk_agencia','left')
                                    ->join('tipo_contas','id_tipo_conta = fk_tipoconta','left')
                                    ->join('bancos','id_banco = contas.fk_banco','left')
                                    ->findAll();

        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => 'cadastro',
            'submenu_active'   => 'conta',
            'title'         => "Conta",
            'results'       => $result,
            'agencias'      => $this->agenciamodel->findAll(),
            'tcontas'       => $this->tcontamodel->findAll(),
            'bancos'      => $this->bancomodel->findAll(),
        ];
       
        return view('conta/index',$data);    
    }

    public function adicionar()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'numero_conta'            => $this->request->getVar('numero'),
            'fk_agencia'        => $this->request->getVar('fk_agencia'),
            'fk_tipoconta'      => $this->request->getVar('fk_tipoconta'),
            'saldo_inicial'     => str_replace(',','.',$this->request->getPost('saldo_inicial')),
            'saldo_atual'     => str_replace(',','.',$this->request->getPost('saldo_inicial')),
            'cheque_especial'   => str_replace(',','.',$this->request->getPost('cheque_especial')),
        ];
        $this->contamodel->save($data);

        return redirect()->back()->with('success','Cadastro efetuado com sucesso!');
    }

    public function excluir($id)
    {
        $this->contamodel->where('id_conta',$id);
        $this->contamodel->delete();

        return redirect()->back()->with('success','conta excluída com sucesso!');
    }
}

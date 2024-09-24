<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BancoModel;
use App\Models\ContaModel;
use App\Models\CpagarModel;
use App\Models\EmpresaModel;
use App\Models\FormaPagamentoModel;
use App\Models\FornecedorModel;
use App\Models\MovimentacaoFinanceiraModel;
use App\Models\TipoCpagarModel;

class CpagarController extends BaseController
{   
    protected $mCpagar;
    protected $mTipo;
    protected $bancoModel;
    protected $fpagamentoModel;
    protected $contaModel;
    protected $fornecedorModel;
    protected $movimentacaoModel;

    public function __construct()
    {
        $this->mCpagar              = new CpagarModel();
        $this->mTipo                = new TipoCpagarModel();
        $this->bancoModel           = new BancoModel();
        $this->fpagamentoModel      = new FormaPagamentoModel();
        $this->contaModel           = new contaModel();
        $this->fornecedorModel      = new FornecedorModel();
        $this->movimentacaoModel    = new MovimentacaoFinanceiraModel(); 
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'financas',
            'submenu_active'    => 'cpagar',
            'title'             => "Contas a pagar",
            'results'           => $this->mCpagar->join('fornecedor','id_fornecedor = fk_fornecedor','left')->findAll(),
            'fornecedores'      => $this->fornecedorModel->findAll(),
        ];
       
        return view('cpagar/index',$data);    
    }

    public function adicionar(){

        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'tipo'          => $this->request->getPost('tipo'),
            'nome'          => $this->request->getPost('nome'),
            'valor'         => str_replace(',','.',$this->request->getVar('valor')),
            'situacao'      => $this->request->getPost('situacao'),
            'dt_vencimento' => $this->request->getPost('dt_vencimento'),
            'obs'           => $this->request->getPost('obs'),
            'fk_fornecedor' => $this->request->getPost('fk_fornecedor'),
        ];

        $this->mCpagar->save($data);

        return redirect()->back()->with('success','Cadastro efetuado com sucesso!');
        
    }

    public function editar($id)
    {   
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'        => $empresa->first(),
            'result'         => $this->mCpagar->find($id),                  
            'menu_active'    => 'financeiro',
            'submenu_active' => 'cpagar',
            'title'          => "Contas a pagar",
        ];

        return view('cpagamento/editar',$data);    

    }

    public function update(){
        $this->mCpagar->where('id_cpagamento',$this->request->getPost('id_cpagamento'));
        $this->mCpagar->set($this->request->getPost());
        $this->mCpagar->update();

        return redirect()->back()->with('success','Condição atualizada com sucesso!');
    }

    public function baixa($id)
    {
        $res = $this->mCpagar->find($id);
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'result'            => $this->mCpagar->where('id_cpagar',$id)
                                        ->join('fornecedor','id_fornecedor='.$res->fk_fornecedor,'left')
                                        ->first(),
            'bancos'            => $this->bancoModel->findAll(),
            'fpagamentos'        => $this->fpagamentoModel->findAll(),
            'menu_active'       => 'financeiro',
            'submenu_active'    => 'cpagar',
            'title'             => "Baixar conta"
        ];

        return view('cpagar/baixar',$data);
    }

    public function excluir($id)
    {
        $this->mCpagar->where('id_cpagar',$id);
        $this->mCpagar->delete();

        return redirect()->back()->with('success','Conta excluída com sucesso!');
    }

    public function buscaConta($id){
        $res = $this->contaModel->where('fk_banco',$id)->findAll();

        return json_encode($res);
    }

    public function baixar(){
        //########    adiciona movimentação financeira    ##############

        $data_movimentacao = [
            'tipo'                  => 'Boleto bancário',
            'numero_conta'          => $this->contaModel->first('id_conta',$this->request->getPost('fk_conta'))->numero_conta,
            'fpagamento'            => $this->fpagamentoModel->first('id_fpagamento',$this->request->getPost('fk_fpagamento'))->descricao,
            'valor'                 => $this->request->getPost('valor'),
            'banco'                 => $this->bancoModel->first('id_banco',$this->request->getPost('fk_banco'))->nome,
            'cliente_fornecedor'    => $this->request->getPost('fantasia'),
            'entrada_saida'         => 'saida',
        ];

        $this->movimentacaoModel->save($data_movimentacao);

        //########    altera saldo da conta     ################

        $conta = $this->contaModel->find($this->request->getPost('fk_conta'));

        $saldo_atual = $conta->saldo_atual;

        $novo_saldo = $saldo_atual - $this->request->getPost('valor');

        $this->contaModel->where('id_conta',$this->request->getPost('fk_conta'))
                            ->set('saldo_atual',$novo_saldo)
                            ->update();

        // ########  baixa boleto pago ################
        $data_pagamento = [
            'dt_pagamento'      => date('Y-m-d'),
            'situacao'          => 'lq',
        ];

        $this->mCpagar->where('id_cpagar',$this->request->getPost('id_cpagar'))
                        ->set($data_pagamento)
                        ->update();

        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'financeiro',
            'submenu_active'    => 'cpagar',
            'title'             => "Contas a pagar",
            'results'           => $this->mCpagar->join('fornecedor','id_fornecedor = fk_fornecedor','left')->findAll(),
            'fornecedores'      => $this->fornecedorModel->findAll(),
            'success', 'Baixa efetuada com sucesso!'
        ];

        return view('cpagar/index',$data); 

    }
}

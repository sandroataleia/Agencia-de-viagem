<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BancoModel;
use App\Models\ContaModel;
use App\Models\CreceberModel;
use App\Models\EmpresaModel;
use App\Models\FormaPagamentoModel;
use App\Models\MovimentacaoFinanceiraModel;
use App\Models\PessoaModel;
use App\Models\TipoCpagarModel;

class CreceberController extends BaseController
{   
    protected $mCreceber;
    protected $mTipo;
    protected $bancoModel;
    protected $fpagamentoModel;
    protected $contaModel;
    protected $pessoaModel;
    protected $movimentacaoModel;

    public function __construct()
    {
        $this->mCreceber            = new CreceberModel();
        $this->mTipo                = new TipoCpagarModel();
        $this->bancoModel           = new BancoModel();
        $this->fpagamentoModel      = new FormaPagamentoModel();
        $this->contaModel           = new contaModel();
        $this->pessoaModel          = new PessoaModel();
        $this->movimentacaoModel    = new MovimentacaoFinanceiraModel(); 
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'financas',
            'submenu_active'    => 'creceber',
            'title'             => "Contas a receber",
            'results'           => $this->mCreceber->join('pessoas','pessoas.cpf = titulo_receber.cpf','left')->findAll(),
        ];
       
        return view('creceber/index',$data);    
    }

    public function baixa($id)
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'result'            => $this->mCreceber->where('id_creceber',$id)
                                        ->join('pessoas','pessoas.cpf=titulo_receber.cpf','left')
                                        ->first(),
            'bancos'            => $this->bancoModel->findAll(),
            'fpagamentos'        => $this->fpagamentoModel->findAll(),
            'menu_active'       => 'financeiro',
            'submenu_active'    => 'creceber',
            'title'             => "Baixar conta"
        ];

        return view('creceber/baixar',$data);
    }

    public function buscaConta($id){
        $res = $this->contaModel->where('fk_banco',$id)->findAll();

        return json_encode($res);
    }

    public function baixar(){
        //########    adiciona movimentação financeira    ##############

        $data_movimentacao = [
            'tipo'                  => 'Recebimento cliente',
            'numero_conta'          => $this->contaModel->first('id_conta',$this->request->getPost('fk_conta'))->numero_conta,
            'fpagamento'            => $this->fpagamentoModel->first('id_fpagamento',$this->request->getPost('fk_fpagamento'))->descricao_fpagamento,
            'valor'                 => $this->request->getPost('valor_pago'),
            'banco'                 => $this->bancoModel->first('id_banco',$this->request->getPost('fk_banco'))->nome,
            'cliente_fornecedor'    => $this->request->getPost('nome'),
            'entrada_saida'         => 'entrada',
        ];

        $this->movimentacaoModel->save($data_movimentacao);

        //########    altera saldo da conta     ################

        $conta = $this->contaModel->find($this->request->getPost('fk_conta'));

        $saldo_atual = $conta->saldo_atual;
        $novo_saldo = $saldo_atual + floatval(str_replace(',','.',$this->request->getPost('valor_pago')));
        
        $this->contaModel->where('id_conta',$this->request->getPost('fk_conta'))
                            ->set('saldo_atual',$novo_saldo)
                            ->update();

        // ########  baixa boleto pago ################
        $data_pagamento = [
            'data_pagamento'      => date('Y-m-d'),
            'situacao'          => '1',
            'valor_pago'        => str_replace(',','.',$this->request->getPost('valor_pago')),
            'valor_aberto'      => 0,
            'fk_usuario_baixa'  => session('id'),
        ];

        $this->mCreceber->where('id_creceber',$this->request->getPost('id_creceber'))
                        ->set($data_pagamento)
                        ->update();

        $empresa = new EmpresaModel();                               
      
        return redirect()->route('financas/creceber'); 
    }
}

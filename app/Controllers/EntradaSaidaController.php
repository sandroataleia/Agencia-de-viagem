<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BancoModel;
use App\Models\ClienteModel;
use App\Models\ContaModel;
use App\Models\EmpresaModel;
use App\Models\FormaPagamentoModel;
use App\Models\FornecedorModel;
use App\Models\MovimentacaoFinanceiraModel;


class EntradaSaidaController extends BaseController
{   
    protected $fPagamentoModel;
    protected $fornecedorModel;
    protected $MovimentacaoModel;
    protected $clienteModel;
    protected $bancoModel;
    protected $contaModel;

    public function __construct()
    {
        $this->fPagamentoModel      = new FormaPagamentoModel();
        $this->fornecedorModel      = new FornecedorModel();
        $this->MovimentacaoModel    = new MovimentacaoFinanceiraModel();
        $this->clienteModel         = new ClienteModel();
        $this->bancoModel           = new BancoModel();
        $this->contaModel           = new ContaModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'financas',
            'submenu_active'    => 'entradas_saidas',
            'title'             => "Entradas/Saídas",
            'bancos'            => $this->bancoModel->findAll(),
            'fpagamentos'       => $this->fPagamentoModel->findAll(),
            'results'           => $this->MovimentacaoModel->findAll(),
            'fornecedores'      => $this->fornecedorModel->findAll(),
            'clientes'          => $this->clienteModel->join('pessoas','pessoas.cpf = clientes.cpf','left')
                                                    ->findAll(),
        ];

        return view('movimentacao/index',$data);    
    }
    
    public function adicionar()
    {
        $data_save = [
            'entrada_saida'         => $this->request->getPost('entrada_saida'),
            'numero_conta'          => $this->request->getPost('numero_conta'),
            'valor'                 => str_replace(',','.',$this->request->getPost('valor')),
            'data'                  => $this->request->getPost('data'),
            'fpagamento'            => $this->request->getPost('fpagamento'),
            'banco'                 => $this->bancoModel->find($this->request->getPost('banco'))->nome,
            'cliente_fornecedor'    => $this->request->getPost('cliente_fornecedor'),
            'descricao'             => $this->request->getPost('descricao'),
        ];

        $this->MovimentacaoModel->save($data_save);

        $res = $this->contaModel->where('numero_conta',$this->request->getPost('numero_conta'))
                        ->first();

        

        $saldo_atual    = 0;
        $valor          = 0;
        $novo_saldo     = 0;

        $valor          = str_replace(',','.',$this->request->getPost('valor'));
        $saldo_atual    = $res->saldo_atual;

        if($this->request->getPost('entrada_saida') == 'entrada'){
            $novo_saldo = $valor+$saldo_atual;
        }else{
            $novo_saldo = $valor-$saldo_atual;
        }
        
        $this->contaModel->where('numero_conta',$this->request->getPost('numero_conta'))
                        ->set('saldo_atual',$novo_saldo)
                        ->update();

        return redirect()->back()->with('success','Entrada efetuada com sucesso!');
    }

    public function excluir($id){
        $mov = $this->MovimentacaoModel->find($id);

        $conta = $this->contaModel->where('numero_conta',$mov->numero_conta)->first();
        
        $saldo_atual    = 0;
        $valor          = 0;
        $novo_saldo     = 0;
        $valor          = $mov->valor;
        $saldo_atual    = $conta->saldo_atual;

        if($mov->entrada_saida == 'entrada'){
            $novo_saldo = $saldo_atual - $valor;
        }else{
            $novo_saldo = $valor + $saldo_atual;
        }
        
        $this->contaModel->where('numero_conta',$conta->numero_conta)
                        ->set('saldo_atual',$novo_saldo)
                        ->update();
        $this->MovimentacaoModel->where('id_movimentacao',$id)
                                ->delete();
        return redirect()->back()->with('success','Excluído com sucesso!');
    }

}

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


class ConciliacaoController extends BaseController
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
            'menu_active'       => 'contabil',
            'submenu_active'    => 'conciliacao',
            'title'             => "Conciliacao",
            'contas'            => $this->contaModel->findAll(),
            'bancos'            => $this->bancoModel->findAll(),
            'fpagamentos'       => $this->fPagamentoModel->findAll(),
            'results'           => [],
            'fornecedores'      => $this->fornecedorModel->findAll(),
            'clientes'          => $this->clienteModel->join('pessoas','pessoas.cpf = clientes.cpf','left')
                                                    ->findAll(),
        ];

        return view('conciliacao/index',$data);    
    }
    
    public function buscar()
    {
        $empresa = new EmpresaModel();  

        unset($_SESSION['data_busca']);
        unset($_SESSION['conta']);

        $_SESSION['data_busca']    = $this->request->getPost('data');
        $_SESSION['conta']         = $this->request->getPost('conta');
        
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'contabil',
            'submenu_active'    => 'conciliacao',
            'title'             => "Conciliacao",
            'contas'            => $this->contaModel->findAll(),
            'bancos'            => $this->bancoModel->findAll(),
            'fpagamentos'       => $this->fPagamentoModel->findAll(),
            'results'           => $this->MovimentacaoModel->where('data',$this->request->getPost('data'))
                                                            ->where('numero_conta',$this->request->getPost('conta'))
                                                            ->findAll(),
            'fornecedores'      => $this->fornecedorModel->findAll(),
            'clientes'          => $this->clienteModel->join('pessoas','pessoas.cpf = clientes.cpf','left')
                                                    ->findAll(),
        ];

        return view('conciliacao/index',$data);    
    }

    public function conciliar($id_conciliacao)
    {
        $this->MovimentacaoModel->where('id_movimentacao',$id_conciliacao)
                                ->set('conciliado',1)
                                ->update();

        $empresa = new EmpresaModel();  
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'contabil',
            'submenu_active'    => 'conciliacao',
            'title'             => "Conciliacao",
            'contas'            => $this->contaModel->findAll(),
            'bancos'            => $this->bancoModel->findAll(),
            'fpagamentos'       => $this->fPagamentoModel->findAll(),
            'results'           => $this->MovimentacaoModel->where('data',$_SESSION['data_busca'])
                                                            ->where('numero_conta',$_SESSION['conta'])
                                                            ->findAll(),
            'fornecedores'      => $this->fornecedorModel->findAll(),
            'clientes'          => $this->clienteModel->join('pessoas','pessoas.cpf = clientes.cpf','left')
                                                    ->findAll(),
        ];

        return view('conciliacao/index',$data); 
    }
}

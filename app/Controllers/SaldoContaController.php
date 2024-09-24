<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContaModel;
use App\Models\EmpresaModel;
use App\Models\TipoContaModel;

class SaldoContaController extends BaseController
{   
    protected $tipomodel;
    protected $contaModel;

    public function __construct()
    {
        $this->tipomodel    = new TipoContaModel();
        $this->contaModel   = new ContaModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'       => $empresa->first(),
            'menu_active'   => 'financas',
            'submenu_active'   => 'saldo',
            'title'         => "Tipos de conta",
            'results'       => $this->contaModel->join('agencias','id_agencia = fk_agencia','left')
            ->join('tipo_contas','id_tipo_conta = fk_tipoconta','left')
            ->join('bancos','id_banco = contas.fk_banco','left')
            ->findAll(),
        ];
       
        return view('conta/saldo',$data);    
    }
}
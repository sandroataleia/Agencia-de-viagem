<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CreceberModel;
use App\Models\EmpresaModel;
use App\Models\FormaPagamentoModel;
use App\Models\ParceiroModel;
use App\Models\PerfilUsuarioModel;
use App\Models\UserModel;
use App\Models\VendaModel;

class AluguelCarroController extends BaseController
{
  protected $mVenda;
  protected $perfilUsuarioModel;
  protected $fpagamentoModel;
  protected $parceiroModel;
  protected $vendaModel;
  protected $cReceberModel;
  protected $usuarioModel;

  public function __construct()
  {
    $this->mVenda               = new VendaModel();
    $this->perfilUsuarioModel   = new PerfilUsuarioModel();
    $this->fpagamentoModel      = new FormaPagamentoModel();
    $this->parceiroModel        = new ParceiroModel();
    $this->vendaModel           = new VendaModel();
    $this->cReceberModel        = new CreceberModel();
    $this->usuarioModel         = new UserModel();
  }

  public function formulario_adicionar()
  {
    $empresa    = new EmpresaModel();

    $data = [
      'empresa'           => $empresa->first(),
      'menu_active'       => 'vendas',
      'submenu_active'    => '',
      'title'             => "Aluguel Carro",
      'fpagamentos'       => $this->fpagamentoModel->findAll(),
      'parceiros'         => $this->parceiroModel->join('pessoas', 'pessoas.cpf = parceiros.cpf', 'left')
                                                  ->findAll(),
    ];
    return view('aluguel_carro/adicionar', $data);
  }

  public function adicionar()
  {
    if ($this->request->getVar('fk_parceiro') == null) {
      $fk_parceiro = '0';
    } else {
      $fk_parceiro = $this->request->getVar('fk_parceiro');
    }

    $data_venda = [
      'cpf'                   => $this->request->getPost('cpf'),
      'valor_liquido'         => str_replace(',', '.', $this->request->getPost('valor_liquido')),
      'fk_fpagamento'         => $this->request->getPost('fk_fpagamento'),
      'fk_parceiro'           => $fk_parceiro,
      'fk_usuario'            => $this->usuarioModel->find(session('id'))->cpf,
      'tipo_venda'            => 'Aluguel Carro',
      'incio_vigencia'        => $this->request->getPost('incio_vigencia'),
      'fim_vigencia'          => $this->request->getPost('fim_vigencia'),
      'concessionaria'        => $this->request->getPost('concessionaria'),
      'retirada'              => $this->request->getPost('retirada'),
      'entrega'               => $this->request->getPost('entrega'),
    ];

    $this->vendaModel->save($data_venda);
    $fk_venda = $this->vendaModel->getInsertID();

    //GERAR TÍTULOS PARA O CLIENTE
    $fpagamento = $this->fpagamentoModel->where('id_fpagamento', $this->request->getPost('fk_fpagamento'))
                                        ->first();

    $dias           = $fpagamento->tempo_pagamento;
    $parcelas       = $fpagamento->parcelas;
    $data           = date('d-m-Y');
    $valor_parcela = round(str_replace(',', '.', $this->request->getPost('valor_liquido')) / $parcelas, 2);

    for ($i = 1; $i <= $parcelas; $i++) {
      $data_vencimento = date('Y-m-d', strtotime($data . ' + ' . $dias . ' days'));

      $data_titulo = [
        'cpf'                 => $this->request->getPost('cpf'),
        'fk_usuario'          => $this->usuarioModel->find(session('id'))->cpf,
        'data_vencimento'     => $data_vencimento,
        'situacao'            => 'ab',
        'valor_pago'          => 0.00,
        'valor_aberto'        => $valor_parcela,
        'valor_original'      => $valor_parcela,
        'fk_venda'            => $fk_venda,
        'fk_fpagamento'       => $this->request->getPost('fk_fpagamento'),
      ];

      $this->cReceberModel->save($data_titulo);
      $dias = $dias - 30;
    }
    return redirect()->route('vendas')->with('success', 'Venda efetuada com sucesso!');
  }

  public function cancelar()
  {
    $this->mVenda->where('id_venda', $this->request->getVar('id_venda'))
      ->set('status', 0)
      ->set('motivo_cancelamento', $this->request->getVar('motivo_cancelamento'))
      ->update();

    return redirect()->route('vendas')->with('success', 'Venda Cancelada com sucesso!');
  }

  public function visualizar($id)
  {
    $empresa    = new EmpresaModel();
    $data = [
      'empresa'           => $empresa->first(),
      'menu_active'       => 'vendas',
      'submenu_active'    => '',
      'title'             => "Viagens",
      'viagem'           => model('VendaModel')->where('id_venda', $id)
        ->join('parceiros', 'fk_parceiro = id_parceiros', 'left')
        ->join('pessoas', 'pessoas.cpf = vendas.cpf', 'left')
        ->join('fpagamentos', 'fpagamentos.id_fpagamento = fk_fpagamento', 'left')
        ->first(),

    ];
    return view('viagem/visualizar_viagem', $data);
  }
}

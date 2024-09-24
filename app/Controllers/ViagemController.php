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

class ViagemController extends BaseController
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

  public function index()
  {
    $empresa    = new EmpresaModel();

    $data = [
      'empresa'           => $empresa->first(),
      'menu_active'       => 'viagens',
      'submenu_active'    => '',
      'title'             => "Status viagem",
      'fpagamentos'       => $this->fpagamentoModel->findAll(),
      'parceiros'         => $this->parceiroModel->join('pessoas', 'pessoas.cpf = parceiros.cpf', 'left')
                                                  ->findAll(),
      'results'           => $this->vendaModel->join('pessoas', 'pessoas.cpf = vendas.cpf', 'left')
                                                ->join('fpagamentos', 'fpagamentos.id_fpagamento = vendas.fk_fpagamento', 'left')
                                                ->findAll(),
    ];
    return view('viagem/index', $data);
  }

  public function formulario_adicionar()
  {
    $empresa    = new EmpresaModel();

    $data = [
      'empresa'           => $empresa->first(),
      'menu_active'       => 'vendas',
      'submenu_active'    => '',
      'title'             => "Viagem",
      'fpagamentos'       => $this->fpagamentoModel->findAll(),
      'parceiros'         => $this->parceiroModel->join('pessoas', 'pessoas.cpf = parceiros.cpf', 'left')
                                                  ->findAll(),
      'checkin'         => $this->vendaModel->where('data_viagem > curdate()')
                                            ->where('hora_embarque > now()')
                                            ->getNumRows(),
    ];
    return view('viagem/adicionar_viagem', $data);
  }

  public function adicionar_viagem()
  {
    if ($this->request->getPost('ida_volta') == 1) {
      $voltaCaucao = 0;
    } else {
      $voltaCaucao = $this->request->getPost('volta_caucao');
    }
    if ($this->request->getVar('fk_parceiro') == null) {
      $fk_parceiro = '0';
    } else {
      $fk_parceiro = $this->request->getVar('fk_parceiro');
    }

    if ($this->request->getVar('milheiro') == null) {
      $milheiro = '0';
    } else {
      $milheiro = $this->request->getVar('milheiro');
    }
    $data_venda = [
      'data_viagem'           => $this->request->getPost('data_viagem'),
      'cpf'                   => $this->request->getPost('cpf'),
      'valor_liquido'         => str_replace(',', '.', $this->request->getPost('valor_liquido')),
      'fk_fpagamento'         => $this->request->getPost('fk_fpagamento'),
      'volta_caucao'          => $voltaCaucao,
      'valor_voltacaucao'     => str_replace(',', '.', $this->request->getPost('valor_voltacaucao')),
      'origem'                => $this->request->getPost('origem'),
      'destino'               => $this->request->getPost('destino'),
      'obs'                   => $this->request->getPost('obs'),
      'local_escala'          => $this->request->getPost('local_escala'),
      'cia_aerea'             => $this->request->getPost('cia_aerea'),
      'cod_reserva'           => $this->request->getPost('cod_reserva'),
      'dt_emissao_passagem'   => $this->request->getPost('dt_emissao_passagem'),
      'milheiro'              => $milheiro,
      'milha'                 => $this->request->getPost('milha'),
      'seguro_viagem'         => $this->request->getPost('seguro_viagem'),
      'hora_viagem'           => $this->request->getPost('hora_viagem'),
      'fk_parceiro'           => $fk_parceiro,
      'tempo_voo'             => $this->request->getPost('tempo_voo'),
      'hora_embarque'         => $this->request->getPost('hora_embarque'),
      'tipo_viagem'           => 'i',
      'fk_usuario'            => $this->usuarioModel->find(session('id'))->cpf,
      'tipo_venda'            => 'Passagem Aérea',
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

    // GERAR TITULO DA VOLTA CAUÇÃO,
    if ($this->request->getPost('volta_caucao') == 1) {
      $data_atual = date('Y-m-d');
      $data_vcaucao = [
        'cpf'                 => $this->request->getPost('cpf'),
        'fk_usuario'          => $this->usuarioModel->find(session('id'))->cpf,
        'data_vencimento'     => $data_atual,
        'situacao'            => 'ab',
        'valor_pago'          => 0.00,
        'valor_aberto'        => str_replace(',', '.', $this->request->getPost('valor_voltacaucao')),
        'valor_original'      => str_replace(',', '.', $this->request->getPost('valor_voltacaucao')),
        'fk_venda'            => $fk_venda,
        'fk_fpagamento'       => $this->request->getPost('fk_fpagamento'),
      ];

      $this->cReceberModel->save($data_vcaucao);
    }

    if ($this->request->getVar('ida_volta') == '1') {
      $empresa    = new EmpresaModel();
      $data = [
        'empresa'           => $empresa->first(),
        'menu_active'       => 'vendas',
        'submenu_active'    => '',
        'title'             => "Viagens",
        'cpf'               => $this->request->getVar('cpf'),
        'nome'              => $this->request->getVar('nomcli'),
        'fpagamentos'       => $this->fpagamentoModel->findAll(),
        'parceiros'         => $this->parceiroModel->join('pessoas', 'pessoas.cpf = parceiros.cpf', 'left')
          ->findAll(),
      ];
      return view('viagem/formulario_viagem_volta', $data);
    }
    return redirect()->route('vendas')->with('success', 'Venda efetuada com sucesso!');
  }

  public function adicionar_viagem_volta()
  {
    $voltaCaucao = 0;
    $fk_parceiro = '0';
    if ($this->request->getVar('milheiro') == null) {
      $milheiro = '0';
    } else {
      $milheiro = $this->request->getVar('milheiro');
    }
    $data_venda = [
      'data_viagem'           => $this->request->getPost('data_viagem'),
      'cpf'            => $this->request->getPost('cpf'),
      'valor_liquido'         => str_replace(',', '.', $this->request->getPost('valor_liquido')),
      'fk_fpagamento'         => $this->request->getPost('fk_fpagamento'),
      'volta_caucao'          => $voltaCaucao,
      'valor_voltacaucao'     => str_replace(',', '.', $this->request->getPost('valor_voltacaucao')),
      'origem'                => $this->request->getPost('origem'),
      'destino'               => $this->request->getPost('destino'),
      'obs'                   => $this->request->getPost('obs'),
      'local_escala'          => $this->request->getPost('local_escala'),
      'cia_aerea'             => $this->request->getPost('cia_aerea'),
      'cod_reserva'           => $this->request->getPost('cod_reserva'),
      'dt_emissao_passagem'   => $this->request->getPost('dt_emissao_passagem'),
      'milheiro'              => $milheiro,
      'milha'                 => $this->request->getPost('milha'),
      'id_usuario'            => session('id'),
      'seguro_viagem'         => $this->request->getPost('seguro_viagem'),
      'hora_viagem'           => $this->request->getPost('hora_viagem'),
      'fk_parceiro'           => $fk_parceiro,
      'tempo_voo'             => $this->request->getPost('tempo_voo'),
      'hora_embarque'         => $this->request->getPost('hora_embarque'),
      'tipo_viagem'           => 'v',
      'fk_usuario'            => $this->usuarioModel->find(session('id'))->cpf,
      'tipo_venda'            => 'Passagem Aérea',
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
        'valor_original'      => $valor_parcela,
        'valor_aberto'        => $valor_parcela,
        'fk_venda'            => $fk_venda,
        'fk_fpagamento'       => $this->request->getPost('fk_fpagamento'),
      ];

      $this->cReceberModel->save($data_titulo);
      $dias = $dias - 30;
    }

    $empresa    = new EmpresaModel();
    $data = [
      'empresa'           => $empresa->first(),
      'menu_active'       => 'vendas',
      'submenu_active'    => '',
      'title'             => "Viagem",
      'fpagamentos'       => $this->fpagamentoModel->findAll(),
      'parceiros'         => $this->parceiroModel->join('pessoas', 'pessoas.cpf = parceiros.cpf', 'left')
        ->findAll(),
    ];
    return redirect()->route('vendas', $data)->with('success', 'Venda efetuada com sucesso!');
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

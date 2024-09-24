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

class VendasController extends BaseController
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
      'menu_active'       => 'vendas',
      'submenu_active'    => '',
      'title'             => "Vendas",
      'results'           => $this->vendaModel->join('pessoas', 'pessoas.cpf = vendas.cpf', 'left')
                                                ->join('fpagamentos', 'fpagamentos.id_fpagamento = vendas.fk_fpagamento', 'left')
                                                ->findAll(),
      'checkin'         => $this->vendaModel->where('data_viagem > curdate()')
                                            ->where('hora_embarque > now()')
                                            ->countAllResults(),

    ];
    return view('venda/index', $data);
  }

  public function cancelar()
  {
    $this->mVenda->where('id_venda', $this->request->getVar('id_venda'))
                  ->set('status', 0)
                  ->set('motivo_cancelamento', $this->request->getVar('motivo_cancelamento'))
                  ->update();

    return redirect()->route('vendas')->with('success', 'Venda Cancelada com sucesso!');
  }
}

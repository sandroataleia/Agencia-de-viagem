<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;
use App\Models\FuncionarioModel;
use App\Models\ParceiroModel;
use App\Models\PessoaModel;
use App\Models\UserModel;
use App\Models\VendaModel;

class ComissaoController extends BaseController
{
  protected $comissaoModel;
  protected $funcionarioModel;
  protected $vendaModel;
  protected $pessoaModel;
  protected $usuarioModel;
  protected $parceiroModel;

  public function __construct()
  {
    $this->comissaoModel      = new VendaModel();
    $this->funcionarioModel   = new FuncionarioModel();
    $this->vendaModel         = new VendaModel();
    $this->pessoaModel        = new PessoaModel();
    $this->usuarioModel       = new UserModel();
    $this->parceiroModel      = new ParceiroModel();
  }

  public function vendedor()
  {
    $empresa = new EmpresaModel();
      $data = [
        'empresa'           => $empresa->first(),
        'menu_active'       => 'relatorio',
        'submenu_active'    => 'comissao_vendedor',
        'title'             => "Comissão por vendas",
        'tipo'              => 'vendedor',
        'vendedores'        => $this->funcionarioModel->where('fk_cargo',5)
                                                        ->join('pessoas','pessoas.cpf = funcionarios.cpf','left')
                                                        ->findAll(),
      ];
      return view('comissao/vendedor/index', $data);
  }

  public function relatorio_vendedor()
  {
    $comissao     = $this->request->getVar('comissao');
    $cpf              = $this->request->getVar('cpf');
    $data_inicial     = $this->request->getVar('data_inicial');
    $data_final       = $this->request->getVar('data_final');

    $results = $this->usuarioModel->where('users.cpf',$cpf)
                                  ->join('vendas','fk_usuario='.$cpf,'left')
                                  ->join('pessoas','pessoas.cpf = '.$cpf,'left')
                                  ->where('data_venda >=',$data_inicial)
                                  ->where('data_venda <=',$data_final)
                                  ->findAll();
    $vlrTotal = 0;
    foreach($results as $result){
      $vlrTotal = $result->valor_liquido + $vlrTotal;
    }
    $valorComissaoLiquido = $vlrTotal * ($comissao /100); 
 
    $data = [
      'vlrTotal'      => $vlrTotal,
      'vlrComissaoLiq'=> $valorComissaoLiquido,
      'results'       => $results,
      'vendedor'      => $this->pessoaModel->where('cpf',$cpf)->first(),
    ];
    $dompdf = new \Dompdf\Dompdf(); 

    $dompdf->loadHtml(view('comissao/vendedor/gerar_pdf',$data));
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->set_option('defaultMediaType', 'all');
    $dompdf->set_option('isFontSubsettingEnabled', true);
    $dompdf->set_option('isPhpEnabled', true);
    $dompdf->set_option('isRemoteEnabled', true);
    $dompdf->render();
    $dompdf->stream();
  }

  public function parceiro()
  {
    $empresa = new EmpresaModel();
      $data = [
        'empresa'           => $empresa->first(),
        'menu_active'       => 'relatorio',
        'submenu_active'    => 'comissao_parceiro',
        'title'             => "Comissão por vendas",
        'tipo'              => 'parceiro',
        'parceiros'        => $this->parceiroModel->join('pessoas','pessoas.cpf = parceiros.cpf','left')
                                                        ->findAll(),
      ];
      return view('comissao/parceiro/index', $data);
  }

  public function relatorio_parceiro()
  {
    $comissao         = $this->request->getVar('comissao');
    $cpf              = $this->request->getVar('cpf');
    $data_inicial     = $this->request->getVar('data_inicial');
    $data_final       = $this->request->getVar('data_final');

    $results = $this->parceiroModel->where('parceiros.cpf',$cpf)
                                  ->join('vendas','vendas.fk_parceiro = parceiros.id_parceiros','left')
                                  ->join('pessoas','pessoas.cpf = '.$cpf,'left')
                                  ->where('data_venda >=',$data_inicial)
                                  ->where('data_venda <=',$data_final)
                                  ->findAll();
    $vlrTotal = 0;
    foreach($results as $result){
      $vlrTotal = $result->valor_liquido + $vlrTotal;
    }
    $valorComissaoLiquido = $vlrTotal * ($comissao /100); 
 
    $data = [
      'vlrTotal'      => $vlrTotal,
      'vlrComissaoLiq'=> $valorComissaoLiquido,
      'results'       => $results,
      'vendedor'      => $this->pessoaModel->where('cpf',$cpf)->first(),
    ];
    $dompdf = new \Dompdf\Dompdf(); 

    $dompdf->loadHtml(view('comissao/vendedor/gerar_pdf',$data));
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->set_option('defaultMediaType', 'all');
    $dompdf->set_option('isFontSubsettingEnabled', true);
    $dompdf->set_option('isPhpEnabled', true);
    $dompdf->set_option('isRemoteEnabled', true);
    $dompdf->render();
    $dompdf->stream();
  }
}

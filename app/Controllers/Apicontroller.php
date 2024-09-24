<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\CreceberModel;
use App\Models\EmpresaModel;
use App\Models\FormaPagamentoModel;
use App\Models\ParceiroModel;
use App\Models\PerfilUsuarioModel;
use App\Models\PessoaModel;
use App\Models\UserModel;
use App\Models\VendaModel;

class ApiController extends BaseController
{
  use ResponseTrait;

  protected $mVenda;
  protected $perfilUsuarioModel;
  protected $fpagamentoModel;
  protected $parceiroModel;
  protected $vendaModel;
  protected $cReceberModel;
  protected $usuarioModel;
  protected $pessoaModel;

  public function __construct()
  {
    $this->mVenda               = new VendaModel();
    $this->perfilUsuarioModel   = new PerfilUsuarioModel();
    $this->fpagamentoModel      = new FormaPagamentoModel();
    $this->parceiroModel        = new ParceiroModel();
    $this->vendaModel           = new VendaModel();
    $this->cReceberModel        = new CreceberModel();
    $this->usuarioModel         = new UserModel();
    $this->pessoaModel          = new PessoaModel();
  }

  public function listarCheckin()
  {
    $data = $this->vendaModel->where('data_viagem >= curdate()')
                                    ->where('hora_embarque > now()')
                                    ->join('pessoas','vendas.cpf = pessoas.cpf','left')
                                    ->findAll(5);
    return $this->respond($data);
  }

  
  public function listarVoltaCaucao()
  {
    $data = $this->vendaModel->where('data_viagem >= curdate()')
                                    ->where('hora_embarque > now()')
                                    ->join('pessoas','vendas.cpf = pessoas.cpf','left')
                                    ->findAll(5);
    return $this->respond($data);
  }
}
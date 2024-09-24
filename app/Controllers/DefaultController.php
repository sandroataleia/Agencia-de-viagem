<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BancoModel;
use App\Models\EmpresaModel;

class DefaultController extends BaseController
{
  protected $bancomodel;

  public function __construct()
  {
    $this->bancomodel = new BancoModel();
  }

  public function index()
  {
    $empresa = new EmpresaModel();
    $data = [
      'empresa'           => $empresa->first(),
      'menu_active'       => 'cadastro',
      'submenu_active'    => 'banco',
      'title'             => "Banco",
      'results'           => $this->bancomodel->findAll(),
    ];

    return view('banco/index',$data);
  }

  public function adicionar()
  {
    $this->bancomodel->save($this->request->getPost());

    return redirect()->back()->with('success', 'Cadastro efetuado com sucesso!');
  }

  public function excluir($id)
  {
    $this->bancomodel->where('id_banco', $id);
    $this->bancomodel->delete();

    return redirect()->back()->with('success', 'Conta excluída com sucesso!');
  }
}

<?php

namespace App\Controllers;

use App\Models\PerfilModel;
use App\Models\PerfilUsuarioModel;
use App\Models\PessoaModel;
use App\Models\UserModel;

class LoginController extends BaseController
{
  protected $mUser;
  protected $mFuncionario;
  protected $perfilUsuarioModel;
  protected $pessoaModel;

  public function __construct()
  {
    $this->mUser                = new UserModel();
    $this->perfilUsuarioModel   = new PerfilUsuarioModel();
    $this->pessoaModel          = new PessoaModel();
  }
  public function index()
  {
    if (session('user')) {
      return redirect()->to('/');
      exit;
    }
    $data = [
      'title'      => ''
    ];

    return view('login/index', $data);
  }

  public function logar()
  {
    $logar = $this->mUser->where('user', $this->request->getVar('user'))
      ->where('password', md5($this->request->getVar('password')))
      ->first();
    if ($logar) {

      $perfis = $this->perfilUsuarioModel->where('fk_usuario', $logar->id_usuario)->findAll();
      foreach ($perfis as $perfil) {
        $data[] =  $perfil['fk_perfil'];
      }

      session()->set('user', $logar->nome_usuario);
      session()->set('cpf', $logar->cpf);
      session()->set('id', $logar->id_usuario);
      session()->set('perfil', $data);
      return redirect()->to('/');
    } else {
      return redirect()->to('login')->with('error', 'Usuario ou senha incorreto');
    }
  }

  public function logout()
  {

    $session = session();
    $session->destroy();
    return redirect()->to('login');
  }
}

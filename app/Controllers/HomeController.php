<?php

namespace App\Controllers;

use App\Models\EmpresaModel;
use App\Models\VendaModel;

class HomeController extends BaseController
{
  protected $vendaModel;

  public function __construct()
  {
    $this->vendaModel = new VendaModel();
  }
  public function index()
  {       
    if(! session('user')){
        return redirect()->to('login');
        exit;
    }

    $empresa = new EmpresaModel();
    $data = [
      'empresa'         => $empresa->first(),
      'menu_active'     => 'home',
      'submenu_active'  => '',
      'title'           => 'Home',
      
    ];
    
    return view('home/index',$data);              
  }
}

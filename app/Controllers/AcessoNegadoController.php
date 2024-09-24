<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;

class AcessoNegadoController extends BaseController
{   
  
    public function index()
    {
        
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'   => '',
            'submenu_active'   => '',
            'title'         => "Acesso negado",
        ];
       
        return view('errors/index',$data);    
    }

}

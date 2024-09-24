<?php

namespace App\Controllers;

use App\Models\EmpresaModel;
use PhpParser\Node\Expr\Empty_;

class KanbanController extends BaseController
{
    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'kanban',
            'title'             => 'Kanban',
        ];
        return view('kanban/index',$data); 
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CargoModel;

class PerfilController extends BaseController
{   
    protected $mCargo;

    public function __construct()
    {
        $this->mCargo = new CargoModel();

    }

    public function index()
    {
        $data['menu_active'] = 'funcionario';
        $data['title']      = "Cargos";
        $data['results']   = $this->mCargo->getRows();
        return view('cargo/index',$data);    
    }

    public function formCad(){
        $data['formas'] = $this->mCargo->getRows();
        $data['menu_active'] = 'funcionario';
        $data['title'] = 'Cargos';
        return view('cargo/adicionar',$data);
    }

    public function adicionar(){
        $this->mCargo->addRow($this->request->getPost());

        return redirect()->to('cargo')->with('success', 'Cargo adicionado com sucesso!');
        
    }

    public function editar($id)
    {   
        $data['result']         = $this->mCargo->find($id);
        $data['formas']         = $this->mCargo->getRows();                    
        $data['menu_active']    = 'funcionario';
        $data['title']          = "Cargos";

        return view('cargo/editar',$data);    

    }

    public function update(){
        $this->mCargo->where('id_cargo',$this->request->getPost('id'));
        $this->mCargo->set($this->request->getPost());
        $this->mCargo->update();

        return redirect()->to('cargo')->with('success', 'Cargo alterado com sucesso!');
    }

    public function excluir($id)
    {
        $this->mCargo->where('id_cargo',$id);
        $this->mCargo->delete();

        return redirect()->back()->with('success', 'Cargo excluído com sucesso!');
    }
}

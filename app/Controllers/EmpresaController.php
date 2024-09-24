<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpresaModel;

class EmpresaController extends BaseController
{   
    protected $empresaModel;

    public function __construct()
    {
        $this->empresaModel = new EmpresaModel();
    }

    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'configuraçoes',
            'submenu_active'    => 'empresa',
            'title'             => "Foma de pagamento",
            'result'            => $this->empresaModel->first(),
        ];

        return view('empresa/index',$data);    
    }

    public function adicionar(){
       $verifica = $this->empresaModel->first();

        if(!$verifica){
            $file = $this->request->getFile('imagem');
            
            if ($file->isValid() && ! $file->hasMoved())
            {
                $name = $file->getName();
                $ext = $file->getClientExtension();
                $newName = $file->getRandomName(); 
                $file->move('images', $newName);

                $data = [
                    'logo'                  => $newName,
                    'cnpj'                  => $this->request->getPost('cnpj'),
                    'razao_social'          => $this->request->getPost('razao_social'),
                    'fantasia'              => $this->request->getPost('fantasia'),
                    'inscricao_estadual'    => $this->request->getPost('inscricao_estadual'),
                    'inscricao_municipal'   => $this->request->getPost('inscricao_municipal'),
                ];

                
                $this->empresaModel->save($data);
                return redirect()->back()->with('success','Cadastro efetuado com sucesso!'); 
            }
        }else{
                $data = [
                    'cnpj'                  => $this->request->getPost('cnpj'),
                    'razao_social'          => $this->request->getPost('razao_social'),
                    'fantasia'              => $this->request->getPost('fantasia'),
                    'inscricao_estadual'    => $this->request->getPost('inscricao_estadual'),
                    'inscricao_municipal'   => $this->request->getPost('inscricao_municipal'),
                ];
                $this->empresaModel->where('id_empresa',$verifica->id_empresa)
                                    ->set($data)
                                    ->update();
                return redirect()->back()->with('success','Alteração efetuada com sucesso!');
        }
    }
}

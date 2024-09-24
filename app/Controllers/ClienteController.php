<?php

namespace App\Controllers;

use App\Models\PessoaModel;
use App\Models\ClienteModel;
use App\Controllers\BaseController;
use App\Models\ArqDocumentosModel;
use App\Models\EmpresaModel;
use App\Models\PastaModel;
use App\Models\VendaModel;

class ClienteController extends BaseController
{   
    protected $mCliente;
    protected $mPessoa;
    protected $mdocumentos;
    protected $mPastas;
    protected $vendasModel;

    public function __construct()
    {
        $this->mCliente     = new ClienteModel();
        $this->mPessoa      = new PessoaModel();
        $this->mdocumentos  = new ArqDocumentosModel();
        $this->mPastas      = new PastaModel();
        $this->vendasModel  = new VendaModel();
    }
    public function index()
    {
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'cliente',
            'title'             => 'Clientes',
            'results'           => $this->mCliente->getRows()
        ];

        return view('clientes/index',$data);    
    }

    public function formulario_cadastro(){
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'cliente',
            'title'             => 'Clientes',
        ];
        return view('clientes/adicionar',$data);
    }

    public function adicionar(){
        
        if($this->mPessoa->verificaCpf($this->request->getPost('cpf')) && $this->mCliente->verificaCliente($this->request->getPost('cpf'))):
            return redirect()->back()->with('warning', 'Cliente já cadastrado!');

        elseif($this->mPessoa->verificaCpf($this->request->getPost('cpf')) && !$this->mCliente->verificaCliente($this->request->getPost('cpf'))):
            $this->mCliente->save($this->request->getPost());
            
            $empresa = new EmpresaModel();                               
            $data = [
                'empresa'           => $empresa->first(),
                'menu_active'   => 'cadastro',
                'submenu_active'   => 'cliente',
                'title'         => 'Clientes',
                'cpf'=>$this->request->getPost('cpf')
            ];

            redirect()->back()->with('success', 'Cadastro efetuado com sucesso!');

        else:

            $this->mPessoa->save($this->request->getPost());
            $this->mCliente->save($this->request->getPost());
            
            $empresa = new EmpresaModel();                               
            $data = [
                'empresa'           => $empresa->first(),
                'menu_active'   => 'cadastro',
                'submenu_active'   => 'cliente',
                'title'         => 'Clientes',
                'cpf'=>$this->request->getPost('cpf')
            ];
            
            return redirect()->back()->with('success', 'Cadastro efetuado com sucesso!');

        endif;
        
    }

    public function editar($id)
    {   
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'cliente',
            'title'             => 'Clientes',
            'cliente'           => $this->mCliente->where('id_cliente',$id)
                                            ->join('pessoas','pessoas.cpf = clientes.cpf','left')
                                            ->first(),
        ];
        return view('clientes/editar',$data);    

    }

    public function update(){

        $this->mCliente->where('cpf',$this->request->getPost('cpf'));
        $this->mCliente->set($this->request->getPost());
        $this->mCliente->update();

        $this->mPessoa->where('cpf',$this->request->getPost('cpf'));
        $this->mPessoa->set($this->request->getPost());
        $this->mPessoa->update();

        return redirect()->back()->with('success', 'Alteração efetuada com sucesso!');
    }

    public function excluir($id)
    {
        $this->mCliente->where('id_cliente',$id);
        
        if($this->mCliente->delete()):
            return redirect()->back()->with('success','Registro excluído com sucesso!');
        else:
            return redirect()->back()->with('error','Houve um erro eu tentar excluir este registro!');
        endif;
    }

    public function documentos($cpf){
        $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'cliente',
            'title'             => 'Cliente - Documentos',
            'cliente'           => $this->mPessoa->where('cpf',$cpf)->first(),
            'pastas'           => $this->mPastas->where('cpf',$cpf)->findAll(),
        ];

        return view('clientes/documentos',$data);    
    }

    public function pasta($id){

      $cpf = $this->mPastas->find($id)->cpf;
      $empresa = new EmpresaModel();                             
      $data = [
          'empresa'           => $empresa->first(),
          'menu_active'       => 'cadastro',
          'submenu_active'    => 'cliente',
          'id_pasta'          => $id,
          'title'             => 'Cliente - Documentos',
          'cliente'           => $this->mPessoa->where('cpf',$cpf)->first(),
          'documentos'        => $this->mdocumentos->where('fk_pasta',$id)->findAll(),
      ];

      return view('clientes/pasta',$data);
    }

    public function adicionar_pasta(){
      $pasta = $this->mPastas->where('descricao_pasta',$this->request->getPost('descricao_pasta'))
                              ->where('cpf',$this->request->getPost('cpf'))
                              ->first();
      if($pasta){
        return redirect()->back()->with('warning', 'Já existe uma pasta com este nome para este cliente.');
      }
      $this->mPastas->save($this->request->getPost());
      return redirect()->back();
    }

    public function excluir_pasta($id){
      $this->mPastas->where('id_pasta',$id)
                    ->delete();
      
      $imagem = $this->mdocumentos->where('fk_pasta',$id)->first();
      if($imagem){
        unlink('uploads/'.$imagem->filename);

        $this->mdocumentos->where('fk_pasta',$id)
                    ->delete();
      }

      return redirect()->back();
    }

    public function excluir_arquivo($id){      
      $imagem = $this->mdocumentos->where('id_arqdocumentos',$id)->first();

      if($imagem){
        unlink('uploads/'.$imagem->filename);
      }

      $this->mdocumentos->where('id_arqdocumentos',$id)
                    ->delete();

      return redirect()->back();
    }

    public function adicionarDocumentos(){
      
        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['images'] as $img) {
                if ($img->isValid() && ! $img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads', $newName);
                }
                $data = [
                    'descricao_arquivo'   => $this->request->getPost('descricao_arquivo'),
                    'fk_pasta'            => $this->request->getPost('fk_pasta'),
                    'filename'            => $newName,
                ];
                $this->mdocumentos->save($data);
            }       
            return redirect()->back();
        }
    }

    public function excluirDocumento($imagem){
        $this->mdocumentos->where('filename',$imagem)->delete();
        unlink('uploads/'.$imagem);
        return redirect()->back()->with('success', 'Imagem excluída com sucesso!');
    }   

    public function buscaCli($cpf){
        $result = $this->mPessoa->where('cpf',$cpf)->first();

        return json_encode($result);
    }

    public function verCliente($cpf){
      $empresa = new EmpresaModel();                               
        $data = [
            'empresa'           => $empresa->first(),
            'menu_active'       => 'cadastro',
            'submenu_active'    => 'cliente',
            'title'             => 'Clientes',
            'cliente'           => $this->mCliente->where('cpf_cliente',$cpf)
                                            ->join('pessoas','pessoas.cpf = clientes.cpf','left')
                                            ->first(),
            'vendas'            => $this->vendasModel->where('cpf',$cpf)
                                                      ->findAll(),
        ];
        return view('clientes/ver',$data);    
    }

    public function verCompras(){
      $empresa = new EmpresaModel();                               
      $data = [
          'empresa'           => $empresa->first(),
          'menu_active'       => 'cadastro',
          'submenu_active'    => 'cliente',
          'title'             => 'Clientes',
          'cliente'           => $this->mCliente->where('id_cliente',$id)
                                          ->join('pessoas','pessoas.cpf = clientes.cpf','left')
                                          ->first(),
      ];
      return view('clientes/ver',$data);    
    }
}

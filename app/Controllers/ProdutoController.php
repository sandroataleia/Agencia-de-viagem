<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\ProdutoModel;
use App\Models\UnidadeModel;

class ProdutoController extends BaseController
{   
    protected $produtomodel;
    protected $unidademodel;
    protected $categoriamodel;

    public function __construct()
    {
        $this->unidademodel = new UnidadeModel();
        $this->produtomodel = new ProdutoModel();
        $this->categoriamodel = new CategoriaModel();
    }

    public function index()
    {
        $data = [
            'menu_active'   => 'cadastro',
            'submenu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            
        ];
       
        return view('produto/index',$data);    
    }

    public function formulariodecadastro()
    {
        $data = [
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
          'submenu_active'   => 'cadastro',
        ];
       
        return view('produto/adicionar',$data);    
    }

    public function adicionar()
    {
        if( $this->produtomodel->where('codigo_barra',$this->request->getPost('codigo_barra'))->first()){
            return redirect()->back()->with('warning','Produto já cadastrado no sistema.');
        }else{

            $file = $this->request->getFile('imagem');
            var_dump($file);
        
            if ($file->isValid() && ! $file->hasMoved())
            {
                $name = $file->getName();
                $ext = $file->getClientExtension();
                $newName = $file->getRandomName(); 
                $file->move('assets/img_produto', $newName);

                $data = [
                    'id_categoria'          => $this->request->getPost('id_categoria'),
                    'id_unidade'            => $this->request->getPost('id_unidade'),
                    'produto'               => $this->request->getPost('produto'),
                    'eh_produto'            => $this->request->getPost('eh_produto'),
                    'eh_insumo'             => $this->request->getPost('eh_insumo'),
                    'eh_promocao'           => $this->request->getPost('eh_promocao'),
                    'eh_maisvendido'        => $this->request->getPost('mais_vendido'),
                    'eh_lancamento'         => $this->request->getPost('eh_lancamento'),
                    'codigo_barra'          => $this->request->getPost('codigo_barra'),
                    'preco_alto'            => str_replace(',','.',$this->request->getPost('preco_alto')),
                    'preco'                 => str_replace(',','.',$this->request->getPost('preco')),
                    'descricao'              => $this->request->getPost('descricao'),
                    'imagem'                => $newName,
                    'estoque_inicial'       => str_replace(',','.',$this->request->getPost('estoque_inicial')),
                    'estoque_minimo'        => str_replace(',','.',$this->request->getPost('estoque_minimo')),
                    'estoque_maximo'        => str_replace(',','.',$this->request->getPost('estoque_maximo')),
                    'estoque_atual'         => str_replace(',','.',$this->request->getPost('estoque_atual')),
                    'estoque_reservado'     => str_replace(',','.',$this->request->getPost('estoque_reservado')),
                    'estoque_real'          => str_replace(',','.',$this->request->getPost('estoque_real')),
                    'custo_atual'           => str_replace(',','.',$this->request->getPost('custo_atual')),
                    'custo_medio'           => str_replace(',','.',$this->request->getPost('custo_medio')),
                    'custo_producao'        => str_replace(',','.',$this->request->getPost('custo_producao')),
                ];
            }else{
                return redirect()->back()->with('success','Ops! Algo deu errado, cadastro não efetuado.');
            }

            $this->produtomodel->save($data);

            return redirect()->back()->with('success','Cadastro efetuado com sucesso!');
        }
    }

    public function formulariodeedicao($id)
    {
        $data = [
            'menu_active'   => 'cadastro',
            'title'         => "ESIS ERP",
            'result'       => $this->produtomodel->find($id),
            'unidades'       => $this->unidademodel->findAll(),
            'categorias'       => $this->categoriamodel->findAll(),
        ];
       
        return view('produto/alterar',$data);    
    }

    public function alterar()
    {

        $file = $this->request->getFile('imagem');
        
            if ($file->isValid() && ! $file->hasMoved())
            {
                $name = $file->getName();
                $ext = $file->getClientExtension();
                $newName = $file->getRandomName(); 
                $file->move('assets/img_produto', $newName);

                $data = [
                    'id_categoria'          => $this->request->getPost('id_categoria'),
                    'id_unidade'            => $this->request->getPost('id_unidade'),
                    'produto'               => $this->request->getPost('produto'),
                    'eh_produto'            => $this->request->getPost('eh_produto'),
                    'eh_insumo'             => $this->request->getPost('eh_insumo'),
                    'eh_promocao'           => $this->request->getPost('eh_promocao'),
                    'eh_maisvendido'        => $this->request->getPost('mais_vendido'),
                    'eh_lancamento'         => $this->request->getPost('eh_lancamento'),
                    'codigo_barra'          => $this->request->getPost('codigo_barra'),
                    'preco_alto'            => str_replace(',','.',$this->request->getPost('preco_alto')),
                    'preco'                 => str_replace(',','.',$this->request->getPost('preco')),
                    'descricao'              => $this->request->getPost('descricao'),
                    'imagem'                => $newName,
                    'estoque_inicial'       => str_replace(',','.',$this->request->getPost('estoque_inicial')),
                    'estoque_minimo'        => str_replace(',','.',$this->request->getPost('estoque_minimo')),
                    'estoque_maximo'        => str_replace(',','.',$this->request->getPost('estoque_maximo')),
                    'estoque_atual'         => str_replace(',','.',$this->request->getPost('estoque_atual')),
                    'estoque_reservado'     => str_replace(',','.',$this->request->getPost('estoque_reservado')),
                    'estoque_real'          => str_replace(',','.',$this->request->getPost('estoque_real')),
                    'custo_atual'           => str_replace(',','.',$this->request->getPost('custo_atual')),
                    'custo_medio'           => str_replace(',','.',$this->request->getPost('custo_medio')),
                    'custo_producao'        => str_replace(',','.',$this->request->getPost('custo_producao')),
                ];

                $this->produtomodel->where('id_produto',$this->request->getPost('id_produto'))
                                    ->set($data)
                                    ->update();
                return redirect()->back()->with('success','Alteração efetuada com sucesso!');
            }else{
                $data = [
                    'id_categoria'          => $this->request->getPost('id_categoria'),
                    'id_unidade'            => $this->request->getPost('id_unidade'),
                    'produto'               => $this->request->getPost('produto'),
                    'eh_produto'            => $this->request->getPost('eh_produto'),
                    'eh_insumo'             => $this->request->getPost('eh_insumo'),
                    'eh_promocao'           => $this->request->getPost('eh_promocao'),
                    'eh_maisvendido'        => $this->request->getPost('mais_vendido'),
                    'eh_lancamento'         => $this->request->getPost('eh_lancamento'),
                    'codigo_barra'          => $this->request->getPost('codigo_barra'),
                    'preco_alto'            => str_replace(',','.',$this->request->getPost('preco_alto')),
                    'preco'                 => str_replace(',','.',$this->request->getPost('preco')),
                    'descricao'              => $this->request->getPost('descricao'),
                    'estoque_inicial'       => str_replace(',','.',$this->request->getPost('estoque_inicial')),
                    'estoque_minimo'        => str_replace(',','.',$this->request->getPost('estoque_minimo')),
                    'estoque_maximo'        => str_replace(',','.',$this->request->getPost('estoque_maximo')),
                    'estoque_atual'         => str_replace(',','.',$this->request->getPost('estoque_atual')),
                    'estoque_reservado'     => str_replace(',','.',$this->request->getPost('estoque_reservado')),
                    'estoque_real'          => str_replace(',','.',$this->request->getPost('estoque_real')),
                    'custo_atual'           => str_replace(',','.',$this->request->getPost('custo_atual')),
                    'custo_medio'           => str_replace(',','.',$this->request->getPost('custo_medio')),
                    'custo_producao'        => str_replace(',','.',$this->request->getPost('custo_producao')),
                ];

                $this->produtomodel->where('id_produto',$this->request->getPost('id_produto'))
                                ->set($data)
                                ->update();
                return redirect()->back()->with('success','Alteração efetuada com sucesso!');
            }
       
    }

    public function excluir($id)
    {
        $this->produtomodel->where('id_produto',$id);
        $this->produtomodel->delete();

        return redirect()->back()->with('success','Excluído com sucesso!');
    }
}

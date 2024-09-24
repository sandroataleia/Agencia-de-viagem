<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table            = 'produto';
    protected $primaryKey       = 'id_produto';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'id_categoria',
                                    'id_unidade',
                                    'produto',
                                    'eh_produto',
                                    'eh_insumo',
                                    'eh_promocao',
                                    'eh_maisvendido',
                                    'eh_lancamento',
                                    'codigo_barra',
                                    'preco_alto',
                                    'preco',
                                    'decricao',
                                    'imagem',
                                    'ativo',
                                    'estoque_inicial',
                                    'estoque_minimo',
                                    'estoque_maximo',
                                    'estoque_atual',
                                    'estoque_reservado',
                                    'estoque_real',
                                    'custo_atual',
                                    'custo_medio',
                                    'custo_producao'
                                    ];
}
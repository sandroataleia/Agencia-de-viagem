<?php

namespace App\Models;

use CodeIgniter\Model;

class VendaModel extends Model
{
    protected $table            = 'vendas';
    protected $primaryKey       = 'id_venda';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
                                    'fk_usuario',
                                    'tipo_venda',
                                    'fk_fpagamento',
                                    'fk_parceiro',
                                    'data_viagem',
                                    'fk_cliente',
                                    'valor_bruto',
                                    'desconto',
                                    'valor_liquido',
                                    'tipo_viagem',
                                    'volta_caucao',
                                    'valor_voltacaucao',
                                    'origem',
                                    'destino',
                                    'obs',
                                    'cia_aerea',
                                    'cod_reserva',
                                    'ind_comp',
                                    'dt_emissao_passagem',
                                    'milheiro',
                                    'milha',
                                    'seguro_viagem',
                                    'descricao_viagem',
                                    'hora_viagem',
                                    'local_escala',
                                    'ultima_alteracao',
                                    'tempo_voo',
                                    'hora_embarque',
                                    'motivo_cancelamento',
                                    'seguradora',
                                    'cpf',
                                    'status',
                                  ];
}
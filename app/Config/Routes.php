<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ######### ROTAS DE API ##################
$routes->get('listarCheckin','ApiController::listarCheckin');



$routes->get('/', 'HomeController::index');

// // ################# LOGIN ##################
$routes->get('login', 'LoginController::index');
$routes->post('logar', 'LoginController::logar');
$routes->get('logout','LoginController::logout');

$routes->get('acesso_negado','AcessoNegadoController::index');

// #################### USUÁRIOS ########################
$routes->group('usuario', ['filter'=> 'auth:8'], static function($routes){
    $routes->get('/','UsuarioController::index'); 
    $routes->match(['get','post'],'(:any)','UsuarioController::$1');
});

// #################### PERFIL DE USUARIO ########################
$routes->group('perfil', ['filter'=> 'auth:21'],static function($routes){
    $routes->get('/','PerfilController::index'); 
    $routes->match(['get','post'],'(:any)','PerfilController::$1');
});


// #################### CLIENTES ########################
$routes->group('cliente',['filter' => 'auth:2'],static function($routes){
    $routes->get('/','ClienteController::index'); 
    $routes->match(['get','post'],'(:any)','ClienteController::$1');
});

// #################### BANCOS ########################
$routes->group('banco', ['filter'=> 'auth:13'],static function($routes){
    $routes->get('/','BancoController::index');
    $routes->match(['get','post'],'(:any)','BancoController::$1');
});

// #################### AGENCIA ########################
$routes->group('agencia', ['filter'=> 'auth:14'],static function($routes){
    $routes->get('/','AgenciaController::index');
    $routes->match(['get','post'],'(:any)','AgenciaController::$1');
});

// #################### CONTA ########################
$routes->group('conta', ['filter'=> 'auth:15'],static function($routes){
    $routes->get('/','ContaController::index');
    $routes->match(['get','post'],'(:any)','ContaController::$1');
});

// #################### FORMA DE PAGAMENTO ########################
$routes->group('fpagamento', ['filter'=> 'auth:12'],static function($routes){
    $routes->get('/','FormaPagamentoController::index');
    $routes->match(['get','post'],'(:any)','FormaPagamentoController::$1');
});

$routes->group('empresa', ['filter'=> 'auth:22'],static function($routes){
    $routes->get('/','EmpresaController::index');
    $routes->match(['get','post'],'(:any)','EmpresaController::$1');
});

$routes->group('fornecedor', ['filter'=> 'auth:23'],static function($routes){
    $routes->get('/','FornecedorController::index');
    $routes->match(['get','post'],'(:any)','FornecedorController::$1');
});

// #################### INICIO CONTABIL ########################
$routes->group('contabil' ,static function($routes){
    $routes->group('conciliacao', ['filter'=> 'auth:20'],static function($routes){
        $routes->get('/','ConciliacaoController::index');
        $routes->match(['get','post'],'(:any)','ConciliacaoController::$1');
    });
});


$routes->get('viagem','ViagemController::index'); 

// #################### INICIO VENDAS ########################
$routes->group('vendas', ['filter'=> 'auth:25'],static function($routes){
  $routes->get('/','VendasController::index');

  $routes->group('viagem', ['filter'=> 'auth:25'],static function($routes){
    $routes->match(['get','post'],'(:any)','ViagemController::$1'); 
  });

  $routes->group('aluguel_hotel', ['filter'=> 'auth:25'],static function($routes){
    $routes->match(['get','post'],'(:any)','AluguelHotelController::$1'); 
  });
  
  $routes->group('aluguel_carro', ['filter'=> 'auth:25'],static function($routes){
    $routes->match(['get','post'],'(:any)','AluguelCarroController::$1'); 
  });

  $routes->group('seguro_viagem', ['filter'=> 'auth:25'],static function($routes){
    $routes->match(['get','post'],'(:any)','SeguroViagemController::$1'); 
  });

  $routes->group('cruzeiro', ['filter'=> 'auth:25'],static function($routes){
    $routes->match(['get','post'],'(:any)','CruzeiroController::$1'); 
  });

  $routes->group('passaporte', ['filter'=> 'auth:25'],static function($routes){
    $routes->match(['get','post'],'(:any)','PassaporteController::$1'); 
  });

  $routes->group('pb4', ['filter'=> 'auth:25'],static function($routes){
    $routes->match(['get','post'],'(:any)','Pb4Controller::$1'); 
  });
});

// #################### INICIO FINANCEIRO ########################
$routes->group('financas' ,static function($routes){
    $routes->group('tipo_conta',static function($routes){
        $routes->get('/','TipoContaController::index');
        $routes->match(['get','post'],'(:any)','TipoContaController::$1');
    });
    
    $routes->group('banco', ['filter'=> 'auth:13'],static function($routes){
        $routes->get('/','BancoController::index');
        $routes->match(['get','post'],'(:any)','BancoController::$1');
    });

    $routes->group('saldo_conta', ['filter'=> 'auth:16'],static function($routes){
        $routes->get('/','SaldoContaController::index');
        $routes->match(['get','post'],'(:any)','SaldoContaController::$1');
    });


    $routes->group('entrada_saida', ['filter'=> 'auth:19'],static function($routes){
        $routes->get('/','EntradaSaidaController::index');
        $routes->match(['get','post'],'(:any)','EntradaSaidaController::$1');
    });

    $routes->group('cpagar', ['filter'=> 'auth:17'],static function($routes){
        $routes->get('/','CpagarController::index');
        $routes->match(['get','post'],'(:any)','CpagarController::$1');
    });

    $routes->group('creceber', ['filter'=> 'auth:17'],static function($routes){
      $routes->get('/','CreceberController::index');
      $routes->match(['get','post'],'(:any)','CreceberController::$1');
  });
});

// #################### INICIO RELATÓRIOS ########################
$routes->group('relatorio', ['filter'=> 'auth:17'],static function($routes){
  $routes->group('comissao', ['filter'=> 'auth:17'],static function($routes){
    $routes->match(['get','post'],'(:any)','ComissaoController::$1');
  });
});


// #################### INICIO FUNCIONÁRIOS  ########################
$routes->group('parceiro', ['filter'=> 'auth:24'],static function($routes){
  $routes->get('/','ParceiroController::index');
  $routes->match(['get','post'],'(:any)','ParceiroController::$1'); 
});

// #################### INICIO FUNCIONÁRIOS  ########################
$routes->group('funcionario', ['filter'=> 'auth:11'],static function($routes){
    $routes->get('/','FuncionarioController::index');
    $routes->match(['get','post'],'(:any)','FuncionarioController::$1'); 
});

// #################### INICIO CARGO  ########################
$routes->group('cargo',static function($routes){
    $routes->get('/','CargoController::index');
    $routes->match(['get','post'],'(:any)','CargoController::$1'); 
});

// #################### INICIO KANBAN  ########################
$routes->group('kanban',static function($routes){
    $routes->get('/','KanbanController::index');
    $routes->match(['get','post'],'(:any)','KanbanController::$1'); 
});


<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EntregadorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/geraPdf', [PdfController::class, 'geraPdf']);


Route::get('/produto', [ProdutoController::class, 'product']);
Route::get('/produto/create', [ProdutoController::class, 'create']);
Route::post('/produto/store', [ProdutoController::class, 'store']);
Route::get('/produto/delete/{id}', [ProdutoController::class, 'destroy']);
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit']);
Route::put('/produto/update/{id}', [ProdutoController::class, 'update']);
 

Route::get('/fornecedor', [FornecedorController::class, 'fornecedor']);
Route::get('/fornecedor/create', [FornecedorController::class, 'create']);
Route::post('/fornecedor/store', [FornecedorController::class, 'store']);
Route::get('/fornecedor/delete/{id}', [FornecedorController::class, 'destroy']);
Route::get('/fornecedor/edit/{id}', [FornecedorController::class, 'edit']);
Route::put('/fornecedor/update/{id}', [FornecedorController::class, 'update']);


Route::get('/entregador', [EntregadorController::class, 'entregador']);
Route::get('/entregador/create', [EntregadorController::class, 'create']);
Route::post('/entregador/store', [EntregadorController::class, 'store']);
Route::get('/entregador/delete/{id}', [EntregadorController::class, 'destroy']);
Route::get('/entregador/edit/{id}', [EntregadorController::class, 'edit']);
Route::put('/entregador/update/{id}', [EntregadorController::class, 'update']);

Route::get('/cliente', [ClienteController::class, 'cliente']);
Route::get('/cliente/create', [ClienteController::class, 'create']);
Route::post('/cliente/store', [ClienteController::class, 'store']);
Route::get('/cliente/delete/{id}', [ClienteController::class, 'destroy']);
Route::get('/cliente/edit/{id}', [ClienteController::class, 'edit']);
Route::put('/cliente/update/{id}', [ClienteController::class, 'update']);


Route::get('/pedido', [PedidoController::class, 'pedido']);
Route::get('/pedido/create', [PedidoController::class, 'create']);
Route::post('/pedido/store', [PedidoController::class, 'store']);
Route::get('/pedido/delete/{id}', [PedidoController::class, 'destroy']);
Route::get('/pedido/edit/{id}', [PedidoController::class, 'edit']);
Route::put('/pedido/update/{id}', [PedidoController::class, 'update']);

Route::get('/entrega', [EntregaController::class, 'entrega']);
Route::get('/entrega/create', [EntregaController::class, 'create']);
Route::post('/entrega/store', [EntregaController::class, 'store']);
Route::get('/entrega/delete/{id}', [EntregaController::class, 'destroy']);
Route::get('/entrega/edit/{id}', [EntregaController::class, 'edit']);
Route::put('/entrega/update/{id}', [EntregaController::class, 'update']);



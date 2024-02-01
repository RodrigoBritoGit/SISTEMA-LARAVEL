<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\index;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->group(function (){
    Route::get('/', [DashboardController::class,'index'])->name('dashboard.index');
});

Route::prefix('produtos')->group(function (){
    Route::get('/', [ProdutosController::class,'index'])->name('produtos.index');
    //CADASTRAR PRODUTOS - CREATE
    Route::get('/cadastrarProduto', [ProdutosController::class,'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class,'cadastrarProduto'])->name('cadastrar.produto');
    //ATUALIZA PRODUTOS - CREATE
    Route::get('/atualizaProduto/{id}', [ProdutosController::class,'atualizaProduto'])->name('atualiza.produto');
    Route::put('/atualizaProduto/{id}', [ProdutosController::class,'atualizaProduto'])->name('atualiza.produto');
    // DELETAR PRODUTOS - DELETE
    Route::delete('/delete', [ProdutosController::class,'delete'])->name('produtos.delete');
});

Route::prefix('clientes')->group(function (){
    Route::get('/', [ClientesController::class,'index'])->name('clientes.index');
    //CADASTRAR CLIENTE - CREATE
    Route::get('/cadastrarClientes', [ClientesController::class,'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarClientes', [ClientesController::class,'cadastrarCliente'])->name('cadastrar.cliente');
    //ATUALIZA CLIENTES - CREATE
    Route::get('/atualizaCliente/{id}', [ClientesController::class,'atualizaCliente'])->name('atualiza.cliente');
    Route::put('/atualizaCliente/{id}', [ClientesController::class,'atualizaCliente'])->name('atualiza.cliente');
    // DELETAR CLIENTES - DELETE
    Route::delete('/delete', [ClientesController::class,'delete'])->name('cliente.delete');
});

Route::prefix('vendas')->group(function (){
    Route::get('/', [VendasController::class,'index'])->name('vendas.index');
    //CADASTRAR CLIENTE - CREATE
    Route::get('/cadastrarVendas', [VendasController::class,'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVendas', [VendasController::class,'cadastrarVenda'])->name('cadastrar.venda');
    //ATUALIZA CLIENTES - CREATE
    Route::get('/atualizaVenda/{id}', [VendasController::class,'atualizaVenda'])->name('atualiza.venda');
    Route::put('/atualizaVenda/{id}', [VendasController::class,'atualizaVenda'])->name('atualiza.venda');
    // DELETAR CLIENTES - DELETE
    Route::delete('/delete', [VendasController::class,'delete'])->name('venda.delete');
    // ENVIAR COMPROVANTE POR EMAIL
    Route::get('/enviaComprovanteEmail/{id}', [VendasController::class,'EnviaComprovantePorEmail'])->name('comprovante.venda');
});

Route::prefix('usuario')->group(function (){
    Route::get('/', [UsuarioController::class,'index'])->name('usuario.index');
     //CADASTRAR USUÁRIO - CREATE
     Route::get('/cadastrarUsuario', [UsuarioController::class,'cadastrarUsuario'])->name('cadastrar.usuario');
     Route::post('/cadastrarUsuario', [UsuarioController::class,'cadastrarUsuario'])->name('cadastrar.usuario');
     //ATUALIZAR USUÁRIO - CREATE
     Route::get('/atualizarUsuario/{id}', [UsuarioController::class,'atualizarUsuario'])->name('atualizar.usuario');
     Route::put('/atualizarUsuario/{id}', [UsuarioController::class,'atualizarUsuario'])->name('atualizar.usuario');
     // DELETAR USUÁRIO - DELETE
     Route::delete('/delete', [UsuarioController::class,'delete'])->name('usuario.delete');
});
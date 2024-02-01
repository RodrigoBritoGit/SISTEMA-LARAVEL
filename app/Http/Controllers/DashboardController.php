<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Produtos;
use App\Models\Vendas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalDeProdutosCadastrados = $this->buscaTotalProdutosCadastrados();
        $totalDeClientesCadastrados = $this->buscaTotalClientesCadastrados();
        $totalDeVendasCadastradas = $this->buscaTotalVendasCadastradas();
        return view('paginas.dashboard.dashboard', compact('totalDeProdutosCadastrados','totalDeClientesCadastrados','totalDeVendasCadastradas'));
    }

    function buscaTotalProdutosCadastrados() {
        $findProduto = Produtos::all()->count();
        return $findProduto;
    }

    function buscaTotalClientesCadastrados() {
        $findClientes = Clientes::all()->count();
        return $findClientes;
    }

    function buscaTotalVendasCadastradas() {
        $findVendas = Vendas::all()->count();
        return $findVendas;
    }
}

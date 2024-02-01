<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVendas;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Clientes;
use App\Models\Produtos;
use App\Models\Vendas;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendasController extends Controller
{
    public function index(Request $request, Vendas $venda) {
        $this ->$venda = $venda;
        $pesquisar = $request->pesquisar;
        $findVendas = $this->$venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
        
        return view('paginas.vendas.listagemVendas', compact('findVendas'));
    }

    public function delete (Request $request) {
        $id = $request->id;
        $buscaRegistro = Vendas::find($id);
        $buscaRegistro->delete();
        Toastr::success('Venda excluída com sucesso');
        return response()->json(['success' => true]);
    }

    public function cadastrarVenda(FormRequestVendas $request){
        $findNumeracao = Vendas::max('numero_da_venda') + 1;
        $findProduto =  Produtos::all();
        $findCliente =  Clientes::all();

        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;

            Vendas::create($data);

            Toastr::success('Venda cadastrada com sucesso.');
            return redirect()->route('vendas.index');
        }
        // mostrar os dados

        return view('paginas.vendas.create', compact('findNumeracao', 'findProduto', 'findCliente'));
    }

    public function EnviaComprovantePorEmail ($id) {
        $buscaVenda = Vendas::where('id', '=', $id)->first();
        $produtoNome = $buscaVenda->produto->nome;
        $produtoValor = $buscaVenda->produto->valor;
        $clienteEmail = $buscaVenda->cliente->email;
        $clienteNome = $buscaVenda->cliente->nome;
        $sendMailData = [
            'produtoNome' => $produtoNome,
            'clienteNome' => $clienteNome,
            'produtoValor' => $produtoValor
        ];
        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));

        Toastr::success('Email enviado com sucesso.');
        return redirect()->route('vendas.index');

    }
}

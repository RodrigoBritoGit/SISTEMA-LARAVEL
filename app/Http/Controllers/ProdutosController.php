<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produtos;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;

class ProdutosController extends Controller
{
    public function index(Request $request, Produtos $produtos) {
        $this ->$produtos = $produtos;
        $pesquisar = $request->pesquisar;
        $findProdutos = $this->$produtos->getProdutosPesquisarIndex(search: $pesquisar ?? '');
        
        return view('paginas.produtos.listagem', compact('findProdutos'));
    }

    public function delete (Request $request) {
        $id = $request->id;
        $buscaRegistro = Produtos::find($id);
        $buscaRegistro->delete();
        Toastr::success('Produto excluído com sucesso');
        return response()->json(['success' => true]);
    }

    public function cadastrarProduto(FormRequestProduto $request){
         if($request->method() == "POST"){
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            Produtos::create($data);
            Toastr::success('Produto cadastrado com sucesso');
            return redirect()->route('produtos.index');
         }
         else {
            return view('paginas.produtos.createProdutos');
         }
    }

    public function atualizaProduto(FormRequestProduto $request, $id){
        if($request->method() == "PUT"){
           $data = $request->all();
           $componentes = new Componentes();
           $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
           $buscaProduto = Produtos::find($id);
           $buscaProduto->update($data);
           Toastr::success('Produto atualizado com sucesso');
           return redirect()->route('produtos.index'); 
        }
        else {
           $findProduto = Produtos::where('id', '=', $id)->first();
           return view('paginas.produtos.updateProdutos', compact('findProduto'));
        }

   }
}

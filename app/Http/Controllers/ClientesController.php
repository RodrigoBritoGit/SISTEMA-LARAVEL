<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Clientes;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
   public function __construct(Clientes $cliente)
   {
       $this->$cliente = $cliente;
   }
    public function index(Request $request, Clientes $clientes) {
        $this -> $clientes = $clientes;
        $pesquisar = $request->pesquisar;
        $findClientes = $this->$clientes->getClientesPesquisarIndex(search: $pesquisar ?? '');
        
        return view('paginas.clientes.listagemClientes', compact('findClientes'));
    }

    public function delete (Request $request) {
        $id = $request->id;
        $buscaRegistro = Clientes::find($id);
        $buscaRegistro->delete();
        Toastr::success('Cliente excluído com sucesso');
        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(FormRequestClientes $request)
    {
        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            Clientes::create($data);
            Toastr::success('Cliente cadastrado com sucesso.');
            return redirect()->route('clientes.index');
        }
        // mostrar os dados
        return view('paginas.clientes.create');
    }

    public function atualizaCliente(Request $request, $id){
        if($request->method() == "PUT"){
           $data = $request->all();
           $buscaProduto = Clientes::find($id);
           $buscaProduto->update($data);
           Toastr::success('Cliente atualizado com sucesso');
           return redirect()->route('clientes.index'); 
        }
        else {
           $findCliente = Clientes::where('id', '=', $id)->first();
           return view('paginas.clientes.updateClientes', compact('findCliente'));
        }

   }
}

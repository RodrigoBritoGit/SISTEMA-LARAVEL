<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(Request $request, User $users) {
        $this ->$users = $users;
        $pesquisar = $request->pesquisar;
        $findUsers = $this->$users->getUsersPesquisarIndex(search: $pesquisar ?? '');
        
        return view('paginas.usuarios.listagem', compact('findUsers'));
    }

    public function delete (Request $request) {
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();
        Toastr::success('Usuário excluído com sucesso');
        return response()->json(['success' => true]);
    }

    public function cadastrarUsuario(UsuarioFormRequest $request){
         if($request->method() == "POST"){
            $data = $request->all();
            $data['password'] = Hash::make($data['password']); 
            User::create($data);
            Toastr::success('Usuário cadastrado com sucesso');
            return redirect()->route('usuario.index');
         }
         else {
            return view('paginas.usuarios.create');
         }
    }

    public function atualizarUsuario(UsuarioFormRequest $request, $id){
        if($request->method() == "PUT"){
           $data = $request->all();
           $buscaUsuario = User::find($id);
           $buscaUsuario->update($data);
           Toastr::success('Usuário atualizado com sucesso');
           return redirect()->route('usuario.index'); 
        }
        else {
           $findUser = User::where('id', '=', $id)->first();
           return view('paginas.usuarios.update', compact('findUser'));
        }

   }
}

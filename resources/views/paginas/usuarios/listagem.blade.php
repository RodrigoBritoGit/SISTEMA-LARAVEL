@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
    </div>

    <div style="margin-bottom: 20px;">
        <form action="{{ route('usuario.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome do usuário" style="width: 400px; height:35px; font-size:16px;" />
            <button style="margin-left: 10px; margin-bottom: 4px; width:130px;" class="btn btn-dark btn-md">Pesquisar</button>
            <a style="margin-top:4px;" type="button" href="{{ route('cadastrar.usuario') }}" class="btn btn-success float-end btn-md">
                Adicionar Usuário
            </a>
        </form>
    </div>


    <div class="table-responsive small">
        
        @if ($findUsers -> isEmpty())
            <div style="font-size: 20px;" class="alert alert-danger" role="alert">
                Não encontramos nenhum usuário cadastrado no sistema !
            </div> 
        @endif

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th style="font-size: 17px;">Nome</th>
                    <th style="font-size: 17px;">Email</th>
                    <th style="font-size: 17px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findUsers as $user)
                    <tr>
                        <td style="font-size: 16px;">{{ $user->name }}</td>
                        <td style="font-size: 16px;">{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('atualizar.usuario', $user->id) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                            <meta name='csrf-token' content="{{ csrf_token() }}" />
                            <a onclick="deleteRegistroListagem( ' {{route('usuario.delete')}}',{{ $user->id }} )" class="btn btn-danger btn-sm">
                                Excluir
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
@endsection

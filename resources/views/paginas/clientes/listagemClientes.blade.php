@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>

    <div style="margin-bottom: 20px;">
        <form action="{{ route('clientes.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome do cliente" style="width: 400px; height:35px; font-size:16px;" />
            <button style="margin-left: 10px; margin-bottom: 4px; width:130px;" class="btn btn-dark btn-md">Pesquisar</button>
            <a style="margin-top:4px;" type="button" href="{{ route('cadastrar.cliente') }}" class="btn btn-success float-end btn-md">
                Adicionar Cliente
            </a>
        </form>
    </div>


    <div class="table-responsive small">
        
        @if ($findClientes -> isEmpty())
            <div style="font-size: 20px;" class="alert alert-danger" role="alert">
                Não encontramos nenhum cliente cadastrado!
            </div> 
        @endif

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th style="font-size: 15px;">Nome</th>
                    <th style="font-size: 15px;">Email</th>
                    <th style="font-size: 15px;">Endereço</th>
                    <th style="font-size: 15px;">Logradouro</th>
                    <th style="font-size: 15px;">CEP</th>
                    <th style="font-size: 15px;">Bairro</th>
                    <th style="font-size: 15px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findClientes as $cliente)
                    <tr>
                        <td style="font-size: 14px;">{{ $cliente->nome }}</td>
                        <td style="font-size: 14px;">{{ $cliente->email }}</td>
                        <td style="font-size: 14px;">{{ $cliente->endereco }}</td>
                        <td style="font-size: 14px;">{{ $cliente->logradouro }}</td>
                        <td style="font-size: 14px;">{{ $cliente->cep }}</td>
                        <td style="font-size: 14px;">{{ $cliente->bairro }}</td>
                        <td>
                            <a href="{{ route('atualiza.cliente', $cliente->id) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                            <meta name='csrf-token' content="{{ csrf_token() }}" />
                            <a onclick="deleteRegistroListagem( ' {{route('cliente.delete')}}',{{ $cliente->id }} )" class="btn btn-danger btn-sm">
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

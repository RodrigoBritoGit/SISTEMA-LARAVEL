@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>

    <div style="margin-bottom: 20px;">
        <form action="{{ route('produtos.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome do produto" style="width: 400px; height:35px; font-size:16px;" />
            <button style="margin-left: 10px; margin-bottom: 4px; width:130px;" class="btn btn-dark btn-md">Pesquisar</button>
            <a style="margin-top:4px;" type="button" href="{{ route('cadastrar.produto') }}" class="btn btn-success float-end btn-md">
                Adicionar Produto
            </a>
        </form>
    </div>


    <div class="table-responsive small">
        
        @if ($findProdutos -> isEmpty())
            <div style="font-size: 20px;" class="alert alert-danger" role="alert">
                Não encontramos nenhum produto cadastrado!
            </div> 
        @endif

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th style="font-size: 17px;">Nome</th>
                    <th style="font-size: 17px;">Valor</th>
                    <th style="font-size: 17px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findProdutos as $produto)
                    <tr>
                        <td style="font-size: 16px;">{{ $produto->nome }}</td>
                        <td style="font-size: 16px;">{{ 'R$' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('atualiza.produto', $produto->id) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                            <meta name='csrf-token' content="{{ csrf_token() }}" />
                            <a onclick="deleteRegistroListagem( ' {{route('produtos.delete')}}',{{ $produto->id }} )" class="btn btn-danger btn-sm">
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

@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>

    <div style="margin-bottom: 20px;">
        <form action="{{ route('vendas.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o número da venda" style="width: 400px; height:35px; font-size:16px;" />
            <button style="margin-left: 10px; margin-bottom: 4px; width:130px;" class="btn btn-dark btn-md">Pesquisar</button>
            <a style="margin-top:4px;" type="button" href="{{ route('cadastrar.venda') }}" class="btn btn-success float-end btn-md">
                Adicionar Venda
            </a>
        </form>
    </div>


    <div class="table-responsive small">
        
        @if ($findVendas -> isEmpty())
            <div style="font-size: 20px;" class="alert alert-danger" role="alert">
                Não encontramos nenhuma venda cadastrada!
            </div> 
        @endif

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th style="font-size: 15px;">Número da venda</th>
                    <th style="font-size: 15px;">Produto</th>
                    <th style="font-size: 15px;">Cliente</th>
                    <th style="font-size: 15px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findVendas as $venda)
                    <tr>
                        <td style="font-size: 14px;">{{ $venda->numero_da_venda }}</td>
                        <td style="font-size: 14px;">{{ $venda->produto->nome }}</td>
                        <td style="font-size: 14px;">{{ $venda->cliente->nome }}</td>
                        <td>
                            <a href="{{ route('atualiza.venda', $venda->id) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                            <meta name='csrf-token' content="{{ csrf_token() }}" />
                            <a onclick="deleteRegistroListagem( ' {{route('venda.delete')}}',{{ $venda->id }} )" class="btn btn-danger btn-sm">
                                Excluir
                            </a>
                            <a href="{{ route('comprovante.venda', $venda->id) }}" class="btn btn-dark btn-sm">
                                Enviar Email
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
@endsection

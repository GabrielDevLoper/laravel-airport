@extends('panel/layouts/app')

@section('content')



    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('flights.index') }}" class="bred">Voos</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">Listagem dos voos</h1>
    </div>

    <div class="content-din bg-white">

        <div class="form-search">
            {{ Form::open(['route' => 'brands.search', 'class' => 'form form-inline']) }}
            {{ Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja procurar?']) }}
            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }}
        </div>

        {{-- mensagem de sucesso ao excluir e erros --}}
        <div class="messages">
            @include('panel.includes.alerts')
        </div>

        <div class="class-btn-insert">
            <a href="{{ route('flights.create') }}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Origem</th>
                <th>Destino</th>
                <th>Paradas</th>
                <th>Data</th>
                <th>Saída</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($flights as $f)
                <tr>
                    <td>
                        <a href="">
                            {{ $f->origin->name }}
                        </a>
                    </td>

                    <td>
                        <a href="">
                            {{ $f->destination->name }}
                        </a>
                    </td>
                    <td>{{ $f->qty_stops }}</td>
                    <td>{{ $f->date }}</td>
                    <td>{{ $f->hour_output }}</td>
                    <td>
                        <a href="{{ route('flights.edit', $f) }}" class="edit btn">Editar</a>
                        <a href="{{ route('flights.show', $f) }}" class="delete btn">Visualizar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum voo cadastrada</td>
                </tr>
            @endforelse
        </table>
        @if (isset($dataForm))
            {{ $flights->appends($dataForm)->links() }}
        @else
            {{ $flights->links() }}
        @endif
    </div>
    <!--Content Dinâmico-->

@endsection

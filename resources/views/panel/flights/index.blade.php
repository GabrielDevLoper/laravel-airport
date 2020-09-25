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
            {{ Form::open(['route' => 'flights.search', 'class' => 'form form-inline']) }}
            {{ Form::number('code', null, ['class' => 'form-control', 'placeholder' => 'Código do voo']) }}
            {{ Form::date('date', null, ['class' => 'form-control']) }}
            {{ Form::number('qty_stops', null, ['class' => 'form-control', 'placeholder' => 'Total de paradas']) }}


            {{ Form::select('airport_origin_id', $airports, null, ['class' => 'form-control', 'placeholder' => 'Selecione o aeroporto']) }}
            {{ Form::select('airport_destination_id', $airports, null, ['class' => 'form-control', 'placeholder' => 'Selecione o aeroporto']) }}

            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }}
        </div>


        @if (isset($dataForm))
            <div class="alert alert-info">
                <p>
                    <a href="{{ route('flights.index') }}">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </a>
                    Resultados para: <strong>{{ $dataForm }}</strong>
                </p>
            </div>
        @endif

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
                <th>ID</th>
                <th>Imagem</th>
                <th>Origem</th>
                <th>Destino</th>
                <th>Paradas</th>
                <th>Data</th>
                <th>Saída</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($flights as $f)
                <tr>
                    <td>{{ $f->id }}</td>
                    <td>
                        @if ($f->image)
                            <img src="{{ url("storage/flights/{$f->image}") }}" alt="{{ $f->id }}"
                                style="max-width: 60px; max-height: 60px">
                        @else
                            <img src="{{ url('assets/site/images/foto.png') }}" alt="{{ $f->id }}"
                                style="max-width: 60px; max-height: 60px;">
                        @endif
                    </td>
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
                    <td>{{ formatDateAndTime($f->date) }}</td>
                    <td>{{ formatDateAndTime($f->hour_output, 'H:i') }}</td>
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

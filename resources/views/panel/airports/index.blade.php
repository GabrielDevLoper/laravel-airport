@extends('panel/layouts/app')

@section('content')
    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('airports.index', $city) }}" class="bred">Aeroportos</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">Aeroportos da cidade: {{ $city->name }}</h1>
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
            <a href="{{ route('airports.create', $city) }}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($airports as $airport)
                <tr>
                    <td>{{ $airport->name }}</td>
                    <td>{{ $airport->address }}</td>
                    <td>
                        <a href="{{ route('airports.edit', [$city, $airport]) }}" class="edit btn">Editar</a>
                        <a href="{{ route('airports.show', [$city, $airport]) }}" class="delete btn">Visualizar</a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhuma marca cadastrada</td>
                </tr>
            @endforelse
        </table>
        @if (isset($dataForm))
            {{ $airports->appends($dataForm)->links() }}
        @else
            {{ $airports->links() }}
        @endif
    </div>
    <!--Content Dinâmico-->

@endsection

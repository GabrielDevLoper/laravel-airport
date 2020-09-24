@extends('panel/layouts/app')

@section('content')
    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('states.index') }}" class="bred">Estados </a>
    </div>
    <div class="title-pg">
        <h1 class="title-pg">{{ $title }}: {{ $states->total() }}</h1>
    </div>
    <div class="content-din bg-white">
        <div class="form-search">
            {{ Form::open(['route' => 'states.search', 'class' => 'form form-inline']) }}
            {{ Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja encontrar?']) }}

            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }}
        </div>
        {{-- mensagem de sucesso ao excluir e erros --}}
        <div class="messages">
            @include('panel.includes.alerts')
        </div>
        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Siglas</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($states as $s)
                <tr>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->initials }}</td>
                    <td>
                        <a href="{{ route('states.cities', $s) }}" class="edit">
                            <i class="fa fa-map-marker" aria-hidden="true"></i> Cidades
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum estado cadastrado</td>
                </tr>
            @endforelse
        </table>
        {{ $states->links() }}
    </div>
    <!--Content Dinâmico-->

@endsection

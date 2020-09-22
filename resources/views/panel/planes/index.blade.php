@extends('panel/layouts/app')

@section('content')
    <div class="bred">
        <a href="" class="bred">Home ></a>
        <a href="" class="bred">Aviões </a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">Listagem dos aviões</h1>
    </div>

    <div class="content-din bg-white">

        <div class="form-search">
            {{-- {{ Form::open(['route' => 'planes.search', 'class' => 'form form-inline']) }}
            {{ Form::text('key_search', null, ['class' => 'form-control']) }}

            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }} --}}
        </div>

        {{-- mensagem de sucesso ao excluir e erros --}}
        <div class="messages">
            @include('panel.includes.alerts')
        </div>

        <div class="class-btn-insert">
            <a href="{{ route('planes.create') }}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar avião
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>Classes</th>
                <th>Marcas</th>
                <th>Total de passageiros</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($planes as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->classes($p->class) }}</td>
                    <td>{{ $p->brand->name }}</td>
                    <td>{{ $p->qty_passengers }}</td>
                    <td>
                        <a href="{{ route('planes.edit', $p) }}" class="edit btn">Editar</a>
                        <a href="{{ route('planes.show', $p) }}" class="delete btn">Visualizar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhum avião cadastrado</td>
                </tr>
            @endforelse
        </table>
        @if (isset($dataForm))
            {{ $planes->appends($dataForm)->links() }}
        @else
            {{ $planes->links() }}
        @endif
    </div>
    <!--Content Dinâmico-->

@endsection

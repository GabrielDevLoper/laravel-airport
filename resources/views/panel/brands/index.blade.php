@extends('panel/layouts/app')

@section('content')



    <div class="bred">
        <a href="" class="bred">Home ></a>
        <a href="" class="bred">Brands</a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">Listagem dos aviões</h1>
    </div>

    <div class="content-din bg-white">

        <div class="form-search">
            {{ Form::open(['route' => 'brands.search', 'class' => 'form form-inline']) }}
            {{ Form::text('key_search', null, ['class' => 'form-control']) }}

            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }}
        </div>

        {{-- mensagem de sucesso ao excluir --}}
        @if (Session('mensagem'))
            <div class="alert alert-success">
                {{ Session('mensagem') }}
            </div>
        @endif

        @if (Session('error'))
            <div class="alert alert-error">
                {{ Session('error') }}
            </div>
        @endif

        <div class="class-btn-insert">
            <a href="{{ route('brands.create') }}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($brands as $b)
                <tr>
                    <td>{{ $b->name }}</td>
                    <td>
                        <a href="{{ route('brands.edit', $b) }}" class="edit btn">Editar</a>
                        <a href="{{ route('brands.show', $b) }}" class="delete btn">Visualizar</a>
                        {{--
                        {{ Form::open(['route' => ['brands.destroy', $b], 'method' => 'delete']) }}
                        <button type="submit" class="delete btn">Excluir</button>
                        {{ Form::close() }} --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhuma marca cadastrada</td>
                </tr>
            @endforelse
        </table>
        @if (isset($dataForm))
            {{ $brands->appends($dataForm)->links() }}
        @else
            {{ $brands->links() }}
        @endif
    </div>
    <!--Content Dinâmico-->

@endsection

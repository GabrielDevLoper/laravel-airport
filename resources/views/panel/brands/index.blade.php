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
            {{ Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'O que deseja procurar?']) }}

            <button class="btn btn-search">Pesquisar</button>
            {{ Form::close() }}
        </div>

        {{-- mensagem de sucesso ao excluir e erros --}}
        <div class="messages">
            @include('panel.includes.alerts')
        </div>

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
                        <a href="{{ route('brands.planes', $b) }}" class="edit btn">
                            <i class="fa fa-plane" aria-hidden="true"></i>
                        </a>

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

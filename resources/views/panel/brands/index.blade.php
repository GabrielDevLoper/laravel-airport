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
            <form class="form form-inline">
                <input type="text" name="nome" placeholder="Nome:" class="form-control">
                <input type="text" name="email" placeholder="E-mail:" class="form-control">

                <button class="btn btn-search">Pesquisar</button>
            </form>
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

                        <form action="{{ route('brands.destroy', $b) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button type="submit" class="delete btn">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="200">Nenhuma marca cadastrada</td>
                </tr>
            @endforelse
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
    <!--Content Dinâmico-->

@endsection

@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="" class="bred">Home ></a>
        <a href="" class="bred">Brands</a>
    </div>



    <a href="" class="">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastrar
    </a>

    <div class="title-pg">
        <h1 class="title-pg">Marcas de Aviões</h1>
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

        <div class="class-btn-insert">
            <a href="{{ route('brands.create') }}" class="btn-insert">
                <span class="glyphicon glyphicon-plus"></span>
                Cadastrar
            </a>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th width="150">Ações</th>
            </tr>

            @foreach ($brands as $b)
                <tr>
                    <td>{{ $b->name }}</td>
                    <td>
                        <a href="" class="edit">Edit</a>
                        <a href="" class="delete">Delete</a>
                    </td>
                </tr>
            @endforeach
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

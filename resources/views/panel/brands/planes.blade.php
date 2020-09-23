@extends('panel/layouts/app')

@section('content')
    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('brands.index') }}" class="bred">Marcas </a>
        <a href="{{ route('brands.planes', $brand) }}" class="bred"> </a>
    </div>

    <div class="title-pg">
        <h1 class="title-pg">{{ $title }}</h1>
    </div>

    <div class="content-din bg-white">


        <table class="table table-striped">
            <tr>
                <th>#ID</th>
                <th>Nome</th>
                <th>Classes</th>
                <th>Total de passageiros</th>
                <th width="200">Ações</th>
            </tr>

            @forelse ($planes as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->classes($p->class) }}</td>
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

    </div>
    <!--Content Dinâmico-->

@endsection

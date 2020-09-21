@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('brands.index') }}" class="bred">Marcas ></a>
        @if (isset($brand))
            <a href="{{ route('brands.edit', $brand) }}" class="bred">Gestão de aviões - Editar</a>
        @else
            <a href="{{ route('brands.create') }}" class="bred">Gestão de aviões - Cadastro</a>
        @endif
    </div>


    <div class="title-pg">
        <h1 class="title-pg">Gestão de Aviões</h1>
    </div>
    <div class="content-din">

        @if (Session('mensagem'))
            <div class="alert alert-success">
                {{ Session('mensagem') }}
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($brand))
            <form class="form form-search form-ds" action="{{ route('brands.update', $brand) }}" method="post">
                {{ method_field('PUT') }}
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{ $brand->name }}">
                </div>

            @else
                <form class="form form-search form-ds" action="{{ route('brands.store') }}" method="post">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Nome:" class="form-control">
                    </div>
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <button class="btn btn-search">Enviar</button>
        </div>
        </form>

    </div>
    <!--Content Dinâmico-->

@endsection

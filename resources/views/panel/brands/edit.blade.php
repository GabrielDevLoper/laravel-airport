@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('brands.index') }}" class="bred">Marcas ></a>
        <a href="{{ route('brands.edit', $brand) }}" class="bred">Editar</a>
    </div>


    <div class="title-pg">
        <h1 class="title-pg">Editar marca: {{ $brand->name }}</h1>
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

        <form class="form form-search form-ds" action="{{ route('brands.update', $brand) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value={{ $brand->id }}>
            <div class="form-group">
                <input type="text" name="name" placeholder="Nome:" class="form-control" value="{{ $brand->name }}">
            </div>

            <div class="form-group">
                <button class="btn btn-search">Enviar</button>
            </div>
        </form>

    </div>
    <!--Content Dinâmico-->

@endsection

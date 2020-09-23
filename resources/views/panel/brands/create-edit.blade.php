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
            {{ Form::open(['route' => ['brands.update', $brand], 'class' => 'form form-search form-ds', 'method' => 'PUT']) }}
            <div class="form-group">
                {{ Form::text('name', $brand->name, ['class' => 'form-control', 'placeholder' => 'Nome']) }}
            </div>
        @else
            {{ Form::open(['route' => 'brands.store', 'class' => 'form form-search form-ds']) }}
            <div class="form-group">
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) }}
            </div>
        @endif
        <div class="form-group">
            <button class="btn btn-search">Salvar Mudanças</button>
        </div>
        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

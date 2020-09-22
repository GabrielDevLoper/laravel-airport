@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('planes.index') }}" class="bred">Aviões ></a>
        @if (isset($brand))
            <a href="{{ route('planes.edit', $brand) }}" class="bred">Gestão de aviões - Editar</a>
        @else
            <a href="{{ route('planes.create') }}" class="bred">Gestão de aviões - Cadastro</a>
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


        {{ Form::open(['route' => 'planes.store', 'class' => 'form form-search form-ds']) }}
        @include('panel.planes.form')

        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

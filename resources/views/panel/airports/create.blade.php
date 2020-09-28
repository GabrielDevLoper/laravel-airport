@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('cities.show', $city) }}" class="bred">Cidade: {{ $city->name }} ></a>
    </div>


    <div class="title-pg">
        <h1 class="title-pg">Cadastrar aeroporto para a cidade: {{ $city->name }}</h1>
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

        {{ Form::open(['route' => 'airports.store', 'class' => 'form form-search form-ds']) }}
        @include('panel.airports.form')

        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

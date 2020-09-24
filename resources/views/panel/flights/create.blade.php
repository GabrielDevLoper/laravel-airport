@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('flights.index') }}" class="bred">Voos ></a>
    </div>


    <div class="title-pg">
        <h1 class="title-pg">Cadastrar voo</h1>
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

        {{ Form::open(['route' => 'flights.store', 'class' => 'form form-search form-ds', 'files' => true]) }}
        @include('panel.flights.form')

        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('planes.index') }}" class="bred">Aviões ></a>
        <a href="{{ route('planes.edit', $plane) }}" class="bred">Gestão de aviões - Editar</a>

    </div>


    <div class="title-pg">
        <h1 class="title-pg">Editar avião: <strong>{{ $plane->name }}</strong></h1>
    </div>
    <div class="content-din">

        @if (Session('mensagem'))
            <div class="alert alert-success">
                {{ Session('mensagem') }}
            </div>
        @endif

        @include('panel.includes.errors')


        {{ Form::model($plane, ['route' => ['planes.update', $plane], 'class' => 'form form-search form-ds', 'method' => 'put']) }}
        @include('panel.planes.form')

        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

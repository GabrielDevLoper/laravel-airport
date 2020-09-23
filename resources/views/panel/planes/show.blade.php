@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('planes.index') }}" class="bred">Aviões ></a>
        <a href="{{ route('planes.show', $plane) }}" class="bred">{{ $plane->id }} ></a>

    </div>

    <div class="title-pg">
        <h1 class="title-pg">{{ $plane->name }}</h1>
    </div>

    <div class="content-din">
        <div class="content-din">
            <ul>
                <li>
                    Nome: <strong>{{ $plane->name }}</strong>
                </li>
                <li>
                    Classe: <strong>{{ $plane->class }}</strong>
                </li>
                <li>
                    Marca: <strong>{{ $brand }}</strong>
                </li>
            </ul>
        </div>
        {{ Form::open(['route' => ['planes.destroy', $plane], 'method' => 'delete']) }}
        <button type="submit" class="delete btn">Deletar o avião {{ $plane->name }}</button>
        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('brands.index') }}" class="bred">Marcas ></a>
        <a href="{{ route('brands.show', $brand) }}" class="bred">{{ $brand->id }}></a>

    </div>

    <div class="title-pg">
        <h1 class="title-pg">{{ $brand->name }}</h1>
    </div>

    <div class="content-din">
        <div class="content-din">
            <ul>
                <li>
                    Nome: <strong>{{ $brand->name }}</strong>
                </li>
            </ul>
        </div>
        {{ Form::open(['route' => ['brands.destroy', $brand], 'method' => 'delete']) }}
        <button type="submit" class="delete btn">Deletar a marca {{ $brand->name }}</button>
        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

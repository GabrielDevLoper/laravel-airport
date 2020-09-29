@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>

    </div>

    <div class="title-pg">
        <h1 class="title-pg">Aeroporto: {{ $airport->name }}, Cidade: {{ $city->name }}</h1>

    </div>

    <div class="content-din">
        <div class="content-din">
            <ul>
                <li>
                    Nome do aeroporto: <strong>{{ $airport->name }}</strong>
                </li>

                <li>
                    Latitude: <strong>{{ $airport->latitude }}</strong>
                </li>

                <li>
                    Longitude: <strong>{{ $airport->longitude }}</strong>
                </li>

                <li>
                    Endereço: <strong>{{ $airport->address }}</strong>
                </li>

                <li>
                    Número: <strong>{{ $airport->number }}</strong>
                </li>

                <li>
                    Código postal: <strong>{{ $airport->zip_code }}</strong>
                </li>

                <li>
                    Complemento: <strong>{{ $airport->complement }}</strong>
                </li>




            </ul>
        </div>
        {{ Form::open(['route' => ['airports.destroy', $city, $airport], 'method' => 'delete']) }}
        <button type="submit" class="delete btn">Deletar o voo {{ $airport->name }}</button>
        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

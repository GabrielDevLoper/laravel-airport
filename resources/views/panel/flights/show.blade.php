@extends('panel/layouts/app')

@section('content')

    <div class="bred">
        <a href="{{ route('home.panel') }}" class="bred">Home ></a>
        <a href="{{ route('flights.index') }}" class="bred">Voos ></a>
        <a href="{{ route('flights.show', $flight) }}" class="bred">{{ $flight->id }}></a>

    </div>

    <div class="title-pg">
        <h1 class="title-pg">Voo: {{ $flight->id }}</h1>
    </div>

    <div class="content-din">
        <div class="content-din">
            <ul>
                <li>
                    Avião escolhido: <strong>{{ $flight->planes->name }}</strong>
                </li>

                <li>
                    Origem: <strong>{{ $flight->origin->name }}</strong>
                </li>

                <li>
                    Destino: <strong>{{ $flight->destination->name }}</strong>
                </li>

                <li>
                    Tempo de duração: <strong>{{ $flight->time_duration }}</strong>
                </li>

                <li>
                    Data: <strong>{{ formatDateAndTime($flight->date) }}</strong>
                </li>

                <li>
                    Hora de chegada: <strong>{{ formatDateAndTime($flight->arrival_tbime, 'H:i') }}</strong>
                </li>

                <li>
                    Hora de saída: <strong>{{ formatDateAndTime($flight->hour_output, 'H:i') }}</strong>
                </li>

                <li>
                    Preço anterior: <strong>R$: {{ number_format($flight->old_price, 2, ',', '.') }}</strong>
                </li>

                <li>
                    Preço: <strong>R$: {{ number_format($flight->price, 2, ',', '.') }}</strong>
                </li>

                <li>
                    Promoção: <strong>{{ $flight->is_promotion ? 'SIM' : 'NÃO' }}</strong>
                </li>

                <li>
                    Total de parcelas: <strong>{{ $flight->total_plots }}</strong>
                </li>

                <li>
                    Quantidade de paradas: <strong>{{ $flight->qty_stops }}</strong>
                </li>

                <li>
                    Descrição: <strong>{{ $flight->description }}</strong>
                </li>


            </ul>
        </div>
        {{ Form::open(['route' => ['flights.destroy', $flight], 'method' => 'delete']) }}
        <button type="submit" class="delete btn">Deletar o voo {{ $flight->name }}</button>
        {{ Form::close() }}

    </div>
    <!--Content Dinâmico-->

@endsection

<div class="form-group">
    <label for="plane_id">Escolha o avião</label>
    {{ Form::select('plane_id', $planes, null, ['class' => 'form-control', 'placeholder' => 'Escolha o avião']) }}
</div>

<div class="form-group">
    <label for="airport_origin_id">Origem</label>
    {{ Form::select('airport_origin_id', $airports, null, ['class' => 'form-control', 'placeholder' => 'Insira o local de origem']) }}
</div>

<div class="form-group">
    <label for="airport_destination_id">Destino</label>
    {{ Form::select('airport_destination_id', $airports, null, ['class' => 'form-control', 'placeholder' => 'Insira o local de destino']) }}
</div>

<div class="form-group">
    <label for="date">Data</label>
    {{ Form::date('date', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label for="time_duration">Duração</label>
    {{ Form::time('time_duration', null, ['class' => 'form-control', 'placeholder' => 'Duração']) }}
</div>

<div class="form-group">
    <label for="hour_output">Horas de saída</label>
    {{ Form::time('hour_output', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label for="arrival_tbime">Horas de chegada</label>
    {{ Form::time('arrival_tbime', null, ['class' => 'form-control', 'placeholder' => 'Horas chegada']) }}
</div>

<div class="form-group">
    <label for="old_price">Preço anterior</label>
    {{ Form::text('old_price', null, ['class' => 'form-control', 'placeholder' => 'Preço anterior']) }}
</div>

<div class="form-group">
    <label for="price">Preço </label>
    {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Preço']) }}
</div>

<div class="form-group">
    <label for="total_plots">Total de parcelas </label>
    {{ Form::number('total_plots', null, ['class' => 'form-control', 'placeholder' => 'Total de parcelas']) }}
</div>

<div class="form-group">
    {{ Form::checkbox('is_promotion', true, null, ['id' => 'is_promotion']) }}
    <label for="is_promotion">É promoção?</label>
</div>

<div class="form-group">
    <label for="image">Foto</label>
    {{ Form::file('image', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label for="qty_stops">Quantidade de paradas</label>
    {{ Form::number('qty_stops', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label for="description">Descrição</label>
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) }}
</div>

<div class="form-group">
    <button class="btn btn-search">Enviar</button>
</div>

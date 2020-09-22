@if (Session('mensagem'))
    <div class="alert alert-success">
        {{ Session('mensagem') }}
    </div>
@endif

@if (Session('error'))
    <div class="alert alert-error">
        {{ Session('error') }}
    </div>
@endif

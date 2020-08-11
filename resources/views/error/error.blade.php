@extends('layouts.app')

@section('content')

    <h2 class=" bold"><i class="fas fa-bomb"></i> Ups!!! ...Ocurrió un error</h2>
    <br/>
    <h5>Mensaje de error:</h5>
    <br/>
    <h5 class="message_error red-c">{{ session('message_error') }}</h5>
    <br/>
    <label>Inténtalo nuevamente. Has clic en el botón inferior para regresar a donde estabas.</label>
    <br/>
    <a href="{{ session('url') ?? url('/') }}" class="btn btn-info">
        <i class="fas fa-sync-alt"></i>
        &nbsp;
        Recargar
    </a>
@endsection

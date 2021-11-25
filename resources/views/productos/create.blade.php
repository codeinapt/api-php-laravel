<!-- Formulario para el ingreso de datos proporcionado por el usuario -->
@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/productos') }}" method="post" enctype="multipart/form-data">
    <!-- Imprecion de llave de seguridad que solicita laravel para recepcionar información -->
    @csrf
    @include('productos.form',['modo'=>'Crear'])

    
    

</form>
</div>
@endsection
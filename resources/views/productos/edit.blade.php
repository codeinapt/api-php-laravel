@extends('layouts.app')

@section('content')
<div class="container">
<!-- Ruta para mostrar el formulario que se encuentra en el archivo form.blade.php  -->
<form action="{{ url('/productos/'.$producto->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('productos.form',['modo'=>'Actualizar'])
</form>
</div>
@endsection

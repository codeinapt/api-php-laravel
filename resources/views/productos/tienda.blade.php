@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
<a href="{{ url('productos/create') }}" class="btn btn-success">Registrar Nuevo Producto</a>

<a href="{{ url('productos/tienda') }}" class="btn btn-secondary">Tienda</a>
<!-- Creación de formulario para listar los datos almacenados -->
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <!-- Se definen los indices de la tabla que precentara la informacion -->
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Conculta y almacenamiento de datos dede la variable 
             productos en el archivo ProductosController.php 
        -->
        @foreach( $productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>
                <img src="{{ asset('storage').'/'.$producto->imagen  }}" alt="" width="100" class="img-thumbnail img-fluid">
            </td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td> 
                <a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="btn btn-primary">Editar</a>
                 | 
                <!-- Configuración de el boton borrar para eliminar los registros de la base de datos -->
                <form action="{{ url('/productos/'.$producto->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('Se eliminara permanentemente este producto desea continuar?')"
                    value="Borrar" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
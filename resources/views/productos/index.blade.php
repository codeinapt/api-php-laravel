Mostrar lista de productos
<!-- Creación de formulario para listar los datos almacenados -->
<table class="table table-dark">
    <thead class="thead-light">
        <!-- Se definen los indices de la tabla que precentara la informacion -->
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
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
                <img src="{{ asset('storage').'/'.$producto->imagen  }}" alt="" width="100">
            </td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td> 
                <a href="{{ url('/productos/'.$producto->id.'/edit') }}">Editar</a>
                 | 
                <!-- Configuración de el boton borrar para eliminar los registros de la base de datos -->
                <form action="{{ url('/productos/'.$producto->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('Se eliminara permanentemente este producto desea continuar?')"
                    value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
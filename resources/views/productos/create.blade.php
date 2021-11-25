<!-- Formulario para el ingreso de datos proporcionado por el usuario -->
Creacion de productos
<form action="{{ url('/productos') }}" method="post" enctype="multipart/form-data">
    <!-- Imprecion de llave de seguridad que solicita laravel para recepcionar información -->
    @csrf
    @include('productos.form');

    
    

</form>
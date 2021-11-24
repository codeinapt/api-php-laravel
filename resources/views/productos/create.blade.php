<!-- Formulario para el ingreso de datos proporcionado por el usuario -->
Creacion de productos
<br>
<form action="{{ url('productos') }}" method="post" enctype="multipart/form-data">
    <!-- Imprecion de llave de seguridad que solicita laravel para recepcionar información -->
    @csrf
    <br>

    <label for="Nombre">Nombre</label>
    <input type="text" name="nombre" id="Nombre">

    <br><br>

    <label for="Precio">Precio</label>
    <input type="text" name="precio" id="Precio">
    
    <br><br>
    
    <label for="Descripcion">Descripción</label>
    <input type="text" name="descripcion" id="Descripcion">
    
    <br><br>


    <label for="Imagen">Imagen</label>
    <input type="file" name="Imagen" id="Imagen">
    <br>
    <br>
    
    <input type="submit" value="Agregar Producto">
    

</form>
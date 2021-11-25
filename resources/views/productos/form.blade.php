
<label for="Nombre">Nombre</label>
    <input type="text" value="{{ $producto->nombre }}" name="Nombre" id="Nombre">

    <br><br>

    <label for="Precio">Precio</label>
    <input type="text" name="Precio" value="{{ $producto->precio }}" id="Precio">
    
    <br><br>
    
    <label for="Descripcion">Descripción</label>
    <input type="text" name="descripcion" value="{{ $producto->descripcion }}" id="Descripcion">
    
    <br><br>


    <label for="Imagen">Imagen</label>
    <img src="{{ asset('storage').'/'.$producto->imagen  }}" alt="" width=100"">
    <input type="file" name="Imagen" value="" id="Imagen">
    <br>
    <br>
    
    <input type="submit" value="Agregar Producto">
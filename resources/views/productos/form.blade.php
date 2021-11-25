
<label for="Nombre">Nombre</label>
    <input type="text" value="{{ isset($producto->nombre)?$producto->nombre:'' }}" name="Nombre" id="Nombre">

    <br><br>

    <label for="Precio">Precio</label>
    <input type="text" name="Precio" value="{{ isset($producto->precio)?$producto->precio:'' }}" id="Precio">
    
    <br><br>
    
    <label for="Descripcion">Descripción</label>
    <input type="text" name="descripcion" value="{{ isset($producto->descripcion)?$producto->descripcion:'' }}" id="Descripcion">
    
    <br><br>


    <label for="Imagen">Imagen</label>
    @if(isset($producto->imagen))
    <img src="{{ asset('storage').'/'.$producto->imagen  }}" alt="" width=100"">
    @endif
    <input type="file" name="Imagen" value="" id="Imagen">
    <br>
    <br>
    
    <input type="submit" value="Guardar Datos">

    <a href="{{ url('productos/') }}">Regresar</a>
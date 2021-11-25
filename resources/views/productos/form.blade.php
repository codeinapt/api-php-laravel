<h1>{{ $modo }} Producto</h1>

 @if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    
        
    
@endif

 <div class="form-group">
<label for="Nombre">Nombre</label>
    <input class="form-control" type="text" value="{{ isset($producto->nombre)?$producto->nombre:old('Nombre') }}" name="Nombre" id="Nombre">
</div>

<div class="form-group">
    <label for="Precio">Precio</label>
    <input class="form-control" type="text" name="Precio" value="{{ isset($producto->precio)?$producto->precio:old('Precio') }}" id="Precio">
</div>

<div class="form-group">    
    <label for="Descripcion">Descripción</label>
    <input class="form-control" type="text" name="descripcion" value="{{ isset($producto->descripcion)?$producto->descripcion:old('descripcion') }}" id="Descripcion">
</div>

<div class="form-group">
    <label for="Imagen"></label>
    @if(isset($producto->imagen))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$producto->imagen  }}" alt="" width=100"">
    @endif
    <input class="form-control" type="file" name="Imagen" value="" id="Imagen">
    <br>
    <br>
</div>

    <input type="submit" value="{{ $modo }} Producto" class="btn btn-success">

    <a href="{{ url('productos/') }}" class="btn btn-info">Regresar</a>
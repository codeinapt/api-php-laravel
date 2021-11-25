<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consualr información a la base de datos
        $datos['productos']=Productos::paginate(5);

        //Envio de informacion de la vista index al controlador
        return view('productos.index',$datos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Envio de informacion de la vista create al controlador
        return view('productos.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Función para recolectar datos enviados a traves del formulario
        $datosProductos = request()->except('_token');

        // Agregar archivo de tipo imagen recolectada al sistema en la ruta store/app/public/uploads
        if($request->hasFile('Imagen')) {

            $datosProductos['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        //Insercion en la base de datos de los registros recolectados 
        Productos::insert($datosProductos);
          return response()->json($datosProductos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto=Productos::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Función para recolectar datos enviados a traves del formulario
        $datosProductos = request()->except(['_token','_method']);
        // Agregar archivo de tipo imagen recolectada al sistema en la ruta store/app/public/uploads
        if($request->hasFile('Imagen')) {
            $producto=Productos::findOrFail($id);
            Storage::delete('public/'.$producto->imagen);
            $datosProductos['Imagen']=$request->file('Imagen')->store('uploads','public');
        }
        //Busqueda de el registro que coincida con el id
        Productos::where('id','=',$id)->update($datosProductos);
        //Buscar la informcion y retornar los datos actualizados
        $producto=Productos::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Funcion para borrado de las imagenes de la carpeta storage
        $producto=Productos::findOrFail($id);
        if(Storage::delete('public/'.$producto->imagen)){
            Productos::destroy($id);
        }
        /* Declaracion de la funcion borrar utilizando 
         * el id de el producto que ya fue capturado 
         * por el boton
         */ 
        Productos::destroy($id);
        return redirect('productos');
    }
}

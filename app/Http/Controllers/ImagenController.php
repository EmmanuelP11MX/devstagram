<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');//recuperación del archivo cargado con dropfile

        $nombreImagen = Str::uuid().".".$imagen->extension();//asignación de id unico y su respectiva extención

        $imagenServidor = Image::make($imagen);//asignacion de la imagen subida a intervencion image para despues subirla al serv.
        $imagenServidor -> fit(1000, 1000);//Se establece la dimencion deseada de la imagen que se subira al serve.

        $imagenPath = public_path('uploads').'/'.$nombreImagen;//asignación de la ruta donde se almacenara la imagen.
        $imagenServidor -> save($imagenPath);//subida de la imagen en memoria al serv

        return response()->json(['imagen'=>$imagen->extension()]);
    }
}

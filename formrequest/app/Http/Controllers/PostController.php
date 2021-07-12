<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //Creacion del metodo para guardar
    public function store(PostRequest $request)
    {   
        //dd(); Ver en detalle lo que tiene la variable
        // y detiene la aplicación
        dd($request->all());

    }
}

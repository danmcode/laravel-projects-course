<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
//use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Creacion y listado de los posts

        $posts = Post::latest()->get();
        //dd($posts);

        //Compact sirve para trabajar igual que un array
        //pero la variable debe tener el mismo nombre de la vista

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //Salvar
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        //Image
        if( $request->file('file') ){
            $post->image = $request->file('file')
            ->store('posts', 'public');

            //Guardar Post
            $post->save();
        }

        // retornar, con la variable de sesión 
        // que se borra con la actualización
        return back()->with('status', 'Creado con éxito');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        //Eliminar imagen anterior

        $post->update($request->all());

        //Image
        if( $request->file('file') ){

            //Eliminar imagen
            Storage::disk('public')->delete($post->image);

            $post->image = $request->file('file')
            ->store('posts', 'public');
        
            //Guardar Post
            $post->save();
        }

        return back()->with('status', 'Actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        //Elminar imagen
        Storage::disk('public')->delete($post->image);
        $post->delete();

        return back()->with('status', 'Eliminado con éxito');
    }
}
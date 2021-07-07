<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //Todos los usuarios que se van a mostrar en la vista
        //User hace referencia a la clase user que es una clase preparada
        //que es como la tabla en la base de datos de usuario.
        $users = User::latest()->get();

        /**
         * Retornar la vista, utilizando clases de Laravel
         * la vista se llama /users/index.blade.php
         * se encuentra en:
         * resources/views/users/index.blade.php
         */
        return view('users.index',[
            'users' => $users
        ]);
    }

    /**
     * Recibe un parametro, utilizamos las vistas de los usuarios
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required'],
            //unique: Tabla ususarios
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bycript($request->password),
        ]);
        // Retornar a las vista anterior
        return back();
        
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}

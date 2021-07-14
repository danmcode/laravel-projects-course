<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //Creación de los datos de configuración

        //Creación de usuario de forma manual
        App\User::create([
            'name'      => 'Daniel M Rivera',
            'email'     => 'd@admin.com',
            'password'  => bcrypt('123456')
        ]);

        //Creación del POST utilizando las factories
        factory(App\Post::class, 24)->create();
    }
}

<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function test_user()
    {

        //Proceso
        User::factory()->create([
            'email' => 'i@admin.com',
        ]);

        //Despues de insertar verificamos que exista
        $this->assertDatabaseHas('users', [
            'email' => 'i@admin.com'
        ]);

        //Despues de eliminar verificamos que no exista
        $this->assertDatabaseMissing('users', [
            'email' => 'no@existe.com'
        ]);
    }
}

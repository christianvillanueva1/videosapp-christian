<?php

namespace Tests\Feature\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_without_permissions_can_see_default_users_page()
    {
        $user = User::factory()->create(); // Crea un usuario autenticado
        $response = $this->actingAs($user)->get(route('users.index')); // Verifica si puede ver la página de usuarios

        $response->assertStatus(200); // Debería devolver un 200 si el usuario está autenticado
    }

    public function test_user_with_permissions_can_see_default_users_page()
    {
        $user = User::factory()->create(); // Crea un usuario autenticado
        $response = $this->actingAs($user)->get(route('users.index')); // Verifica si puede ver la página de usuarios

        $response->assertStatus(200); // Debería devolver un 200 si el usuario está autenticado
    }

    public function test_not_logged_users_cannot_see_default_users_page()
    {
        $response = $this->get(route('users.index')); // Verifica si un no autenticado puede acceder a la página

        $response->assertRedirect(route('login')); // Debería redirigir al login si no está autenticado
    }

    public function test_user_without_permissions_can_see_user_show_page()
    {
        $user = User::factory()->create(); // Crea un usuario autenticado
        $userToShow = User::factory()->create(); // Crea un usuario para mostrar
        $response = $this->actingAs($user)->get(route('users.show', $userToShow->id)); // Verifica si puede ver la página del usuario

        $response->assertStatus(200); // Debería devolver un 200 si el usuario está autenticado
    }

    public function test_user_with_permissions_can_see_user_show_page()
    {
        $user = User::factory()->create(); // Crea un usuario autenticado
        $userToShow = User::factory()->create(); // Crea un usuario para mostrar
        $response = $this->actingAs($user)->get(route('users.show', $userToShow->id)); // Verifica si puede ver la página del usuario

        $response->assertStatus(200); // Debería devolver un 200 si el usuario está autenticado
    }

    public function test_not_logged_users_cannot_see_user_show_page()
    {
        $userToShow = User::factory()->create(); // Crea un usuario para mostrar

        $response = $this->get(route('users.show', $userToShow->id)); // Verifica si un no autenticado puede acceder a la página del usuario

        $response->assertRedirect(route('login')); // Debería redirigir al login si no está autenticado
    }
}

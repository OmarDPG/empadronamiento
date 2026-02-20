<?php

use CodeIgniter\Test\FeatureTestCase;

class LoginTest extends FeatureTestCase
{
    public function testLoginPageLoads()
    {
        $result = $this->call('get', '/login');
        $result->assertStatus(200);
        $result->assertSee('Iniciar sesión'); // Ajusta según tu vista
    }

    public function testLoginWithInvalidCredentials()
    {
        $result = $this->call('post', '/login/auth', [
            'correo' => 'fake@example.com',
            'password' => 'wrongpassword',
        ]);

        $result->assertRedirect(); // Si falla, esperamos una redirección
    }
}

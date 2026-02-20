<?php

use CodeIgniter\Test\FeatureTestCase;

class HomeTest extends FeatureTestCase
{
    public function testHomePageLoads()
    {
        $result = $this->call('get', '/');
        $result->assertStatus(200);
        $result->assertSee('Bienvenido'); // Ajusta según tu vista
    }
}

<?php

namespace Sil2\Vidflex\Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class ApiTest extends TestCase
{

    public function testApiNoAuth()
    {
        $response = $this->json('get', '/api/cart')
            ->assertStatus(401);
    }
}

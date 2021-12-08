<?php

namespace Sil2\Vidflex\Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{

    public $className = 'Sil2\Vidflex\Models\Order';

    /**
     * Testing address with no argument passed
     *
     * @return void
     */
    public function testInitOrder()
    {
        $oreder = new \Sil2\Vidflex\Models\Order();
        $this->assertInstanceOf($this->className, $oreder);
    }
}

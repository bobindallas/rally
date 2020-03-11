<?php namespace Shop\Models;

use PHPUnit\Framework\TestCase;
use Mockery as m;

class CartsTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }
}

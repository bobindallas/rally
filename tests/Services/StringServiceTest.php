<?php namespace Shop\Services;

use PHPUnit\Framework\TestCase;
use Mockery as m;

class StringServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }
}

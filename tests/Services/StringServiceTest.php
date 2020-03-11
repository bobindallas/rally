<?php namespace Shop\Services;

use PHPUnit\Framework\TestCase;
use Mockery as m;

class StringServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }

	 public function testStringService() {
	 
		 $service = m::mock('service');
		 $service->shouldReceive('erase');

		 $ss = new StringService($service);

		 $this->assertEquals('', $ss->erase('%%%'));
		 $this->assertEquals('hello', $ss->erase('he%%l%hel%llo'));
		 $this->assertEquals('majo spks', $ss->erase('major% spar%%ks'));
		 $this->assertEquals('t boy', $ss->erase('si%%%t boy'));
	 
	 }
}

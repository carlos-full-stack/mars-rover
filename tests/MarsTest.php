<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Mars\Mars;

final class MarsTest extends TestCase
{

    protected $mars;

    protected function setUp(): void
    {
        $this->mars = new Mars();
    }

    public function test_Object_Has_Atributtes_With_Default_Values() : void
    {
        $this->assertEquals( 25 , $this->mars->area['x'] && $this->mars->area['y'] );
        $this->assertEquals( 20 , $this->mars->obstacle['x'] && $this->mars->obstacle['y'] );
    }

}